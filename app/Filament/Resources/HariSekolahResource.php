<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HariSekolahResource\Pages;
use App\Filament\Resources\HariSekolahResource\RelationManagers;
use App\Models\HariSekolah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HariSekolahResource extends Resource
{
    protected static ?string $model = HariSekolah::class;

    protected static ?string $navigationIcon = 'heroicon-s-calendar-days';
    protected static ?string $modelLabel = 'Hari';
    protected static ?string $navigationLabel = 'Hari Sekolah';
    protected static ?string $navigationGroup = 'Data Referensi Akademik';
    protected static ?int $navigationSort = 5;
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
            'index' => Pages\ListHariSekolahs::route('/'),
            'create' => Pages\CreateHariSekolah::route('/create'),
            'edit' => Pages\EditHariSekolah::route('/{record}/edit'),
        ];
    }    
}
