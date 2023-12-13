<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenentuanKenaikanResource\Pages;
use App\Filament\Resources\PenentuanKenaikanResource\RelationManagers;
use App\Filament\Resources\PenentuanKenaikanResource\RelationManagers\KenaikantingkatsRelationManager;
use App\Models\PenentuanKenaikan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenentuanKenaikanResource extends Resource
{
    protected static ?string $model = PenentuanKenaikan::class;

    protected static ?string $navigationIcon = 'heroicon-s-chart-bar';
    protected static ?string $modelLabel = 'Penentuan Kenaikan Kelas';
    protected static ?string $navigationLabel = 'Penentuan Kenaikan Kelas';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 9;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('tingkat_id')
                    ->label('Kelas')
                    ->required()
                    ->relationship('tingkat','nama'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tingkat_id')
                    ->label('Kelas')
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
            KenaikantingkatsRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenentuanKenaikans::route('/'),
            'create' => Pages\CreatePenentuanKenaikan::route('/create'),
            'edit' => Pages\EditPenentuanKenaikan::route('/{record}/edit'),
        ];
    }    
}
