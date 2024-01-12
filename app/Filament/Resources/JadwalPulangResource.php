<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JadwalPulangResource\Pages;
use App\Filament\Resources\JadwalPulangResource\RelationManagers;
use App\Filament\Resources\JadwalPulangResource\RelationManagers\SantrisRelationManager;
use App\Models\JadwalPulang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JadwalPulangResource extends Resource
{
    protected static ?string $model = JadwalPulang::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-list';
    protected static ?string $modelLabel = 'Jadwal Pulang Santri';
    protected static ?string $navigationLabel = 'Jadwal Pulang Santri';
    protected static ?string $navigationGroup = 'Manajemen Asrama';
    protected static ?int $navigationSort = 3;
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal_pulang')
                    ->label('Tanggal Pulang')
                    ->required(),
                Forms\Components\Select::make('jenis_libur')
                    ->preload()
                    ->options([
                        'Mingguan' => 'Mingguan',
                        'Libur Sekolah' => 'Libur Sekolah'
                    ]),
                Forms\Components\Select::make('asrama_id')
                    ->preload()
                    ->searchable()
                    ->relationship('asrama','nama')
                    ->label('Asrama'),
                Forms\Components\Select::make('user_id')
                    ->preload()
                    ->disabled()
                    ->relationship('user','name')
                    ->default(Auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_pulang')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('asrama.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_libur')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Diinput Oleh')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            SantrisRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJadwalPulangs::route('/'),
            'create' => Pages\CreateJadwalPulang::route('/create'),
            'edit' => Pages\EditJadwalPulang::route('/{record}/edit'),
        ];
    }
}
