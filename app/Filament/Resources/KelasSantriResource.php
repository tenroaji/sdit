<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KelasSantriResource\Pages;
use App\Filament\Resources\KelasSantriResource\RelationManagers;
use App\Models\KelasSantri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KelasSantriResource extends Resource
{
    protected static ?string $model = KelasSantri::class;

    protected static ?string $navigationIcon = 'heroicon-s-building-storefront';
    protected static ?string $modelLabel = 'Penentuan Ruang Kelas Santri';
    protected static ?string $navigationLabel = 'Penentuan Ruang Kelas Santri';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 3;
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('santri_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('kelas_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tingkat_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('semester')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('santri_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelas_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tingkat_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('semester')
                    ->searchable(),
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
            'index' => Pages\ListKelasSantris::route('/'),
            'create' => Pages\CreateKelasSantri::route('/create'),
            'edit' => Pages\EditKelasSantri::route('/{record}/edit'),
        ];
    }    
}
