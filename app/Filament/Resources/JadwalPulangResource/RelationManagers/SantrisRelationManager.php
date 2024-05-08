<?php

namespace App\Filament\Resources\JadwalPulangResource\RelationManagers;

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
                    ->searchable()
                    ->relationship('santri','nama')
                    ->label('Santri'),
                Forms\Components\Select::make('user_id')
                    ->disabled()
                    ->relationship('user','name')
                    ->default(Auth()->id())
                    ->label('Diinput Oleh'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // ->recordTitleAttribute('jadwalpulang_id')
            ->columns([
                Tables\Columns\TextColumn::make('santri.nama')
                ->label('Santri'),
                Tables\Columns\TextColumn::make('user.name')
                ->label('Diinput Oleh'),
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
