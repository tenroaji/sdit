<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JamSekolahResource\Pages;
use App\Filament\Resources\JamSekolahResource\RelationManagers;
use App\Models\JamSekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JamSekolahResource extends Resource
{
    protected static ?string $model = JamSekolah::class;

    protected static ?string $navigationIcon = 'heroicon-s-clock';
    protected static ?string $modelLabel = 'Jam Pelajaran';
    protected static ?string $navigationLabel = 'Jam Pelajaran';
    protected static ?string $navigationGroup = 'Data Referensi Akademik';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
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
            'index' => Pages\ListJamSekolahs::route('/'),
            'create' => Pages\CreateJamSekolah::route('/create'),
            'edit' => Pages\EditJamSekolah::route('/{record}/edit'),
        ];
    }    
}
