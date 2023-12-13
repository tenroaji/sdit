<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DaftarSurahResource\Pages;
use App\Filament\Resources\DaftarSurahResource\RelationManagers;
use App\Models\DaftarSurah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DaftarSurahResource extends Resource
{
    protected static ?string $model = DaftarSurah::class;

    protected static ?string $navigationIcon = 'heroicon-s-book-open';
    protected static ?string $modelLabel = 'Daftar Surah Al Quran ';
    protected static ?string $navigationLabel = 'Daftar Surah';
    protected static ?string $navigationGroup = 'Data Referensi Sekolah';
    protected static ?int $navigationSort = -2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_ayat')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah_ayat')
                    ->numeric()
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
            'index' => Pages\ListDaftarSurahs::route('/'),
            'create' => Pages\CreateDaftarSurah::route('/create'),
            'edit' => Pages\EditDaftarSurah::route('/{record}/edit'),
        ];
    }    
}
