<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PelanggaranResource\Pages;
use App\Filament\Resources\PelanggaranResource\RelationManagers;
use App\Models\Pelanggaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PelanggaranResource extends Resource
{
    protected static ?string $model = Pelanggaran::class;

    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-left-ellipsis';
    protected static ?string $modelLabel = 'Pelanggaran Kedisiplinan';
    protected static ?string $navigationLabel = 'Pelanggaran Kedisiplinan';
    protected static ?string $navigationGroup = 'Kegiatan Sekolah';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jenispelanggaran_id')
                    ->preload()
                    ->searchable()
                    ->relationship('jenispelanggaran','nama')
                    ->label('Jenis Pelanggaran'),
                Forms\Components\DatePicker::make('tanggal')
                ,
                Forms\Components\Select::make('santri_id')
                    ->preload()
                    ->searchable()
                    ->relationship('santri','nama')
                    ->label('Santri'),
                Forms\Components\TextInput::make('hukuman')
                    ->maxLength(255),
                Forms\Components\Select::make('user_id')
                    ->label('Diinput Oleh')
                    ->relationship('user','name')
                    ->default(Auth()->id())
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenispelanggaran.nama')
                    ->label('Jenis Pelanggaran')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('santri.nama')
                    ->label('Santri')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hukuman')
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
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPelanggarans::route('/'),
            'create' => Pages\CreatePelanggaran::route('/create'),
            'edit' => Pages\EditPelanggaran::route('/{record}/edit'),
        ];
    }    
}
