<?php

namespace App\Filament\Resources\GuruResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MatapelajaransRelationManager extends RelationManager
{
    protected static string $relationship = 'matapelajarans';
    protected static ?string $modelLabel = 'Mata Pelajaran Diampuh';
    protected static ?string $title = 'Mata Pelajaran Diampuh';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('matapelajaran_id')
                ->relationship('matapelajaran','nama')
                ->preload()
                ->label('Mata Pelajaran')
                ->searchable(),
                Forms\Components\Select::make('tingkat_id')
                ->label('Kelas')
                ->relationship('tingkat','nama')
                ->preload()
                ->searchable(),
                 
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('guru_id')
            ->columns([
                Tables\Columns\TextColumn::make('matapelajaran.nama')
                ->label('Mata Pelajaran'),
                Tables\Columns\TextColumn::make('tingkat.nama')
                ->label('Kelas'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
}
