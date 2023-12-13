<?php

namespace App\Filament\Resources\PengaturanAsramaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SantrisRelationManager extends RelationManager
{
    protected static string $relationship = 'santris';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('santri_id')
                    ->preload()
                    ->relationship('santri','nama')
                    ->searchable(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user','name')
                    ->default(Auth()->id())
                    ->disabled()
                    ->label('Diinput Oleh'),    
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('pengaturanasrama_id')
            ->columns([
                Tables\Columns\TextColumn::make('santri.nama'),
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
