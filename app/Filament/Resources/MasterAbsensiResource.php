<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterAbsensiResource\Pages;
use App\Filament\Resources\MasterAbsensiResource\RelationManagers;
use App\Filament\Resources\MasterAbsensiResource\RelationManagers\AbsensisRelationManager;
use App\Models\MasterAbsensi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasterAbsensiResource extends Resource
{
    protected static ?string $model = MasterAbsensi::class;
    protected static ?string $navigationIcon = 'heroicon-s-document-text';
    protected static ?string $modelLabel = 'Pengisian Absensi';
    protected static ?string $navigationLabel = 'Pengisian Absensi';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                ->maxLength('4')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')
                ->default(now())
                    ->required(),
                Forms\Components\Select::make('matapelajaran_id')
                    ->relationship('matapelajaran', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('jam_id')
                    ->relationship('jam', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make('guru_id')
                    ->relationship('guru', 'nama')
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('kelas_id')
                    ->relationship('kelas', 'nama')
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(Auth()->id())
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    
                    ->sortable(),
                Tables\Columns\TextColumn::make('jam.nama')
                    ->label('Jam Pelajaran'),
                Tables\Columns\TextColumn::make('matapelajaran.nama')

                    ->sortable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelas.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
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
            AbsensisRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMasterAbsensis::route('/'),
            'create' => Pages\CreateMasterAbsensi::route('/create'),
            'edit' => Pages\EditMasterAbsensi::route('/{record}/edit'),
        ];
    }
}
