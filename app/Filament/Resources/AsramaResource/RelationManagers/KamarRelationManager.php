<?php

namespace App\Filament\Resources\AsramaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KamarRelationManager extends RelationManager
{
    protected static string $relationship = 'kamar';
    protected static ?string $modelLabel = 'Data Kamar';
    protected static ?string $title = 'Data Kamar';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Kamar')
                    ->required()
                    ->maxLength(255),
                    Forms\Components\Select::make('user_id')
                    ->label('Diinput Oleh')
                    ->relationship('user','name')
                    ->disabled()
                    ->preload()
                    ->default(Auth()->id()),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // ->recordTitleAttribute('asrama_id')
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                ->label('Nama Kamar'),
                Tables\Columns\TextColumn::make('user.name')
                ->label('Didata Oleh'),
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
