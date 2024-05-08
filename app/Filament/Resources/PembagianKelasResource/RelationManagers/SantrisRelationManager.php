<?php

namespace App\Filament\Resources\PembagianKelasResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class SantrisRelationManager extends RelationManager
{
    protected static string $relationship = 'santris';
    protected static ?string $modelLabel = 'Santri Pada Kelas Tersebut';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('santri_id')
                    ->label('Santri')
                    ->relationship('santri','nama')
                    ->searchable()
                    ->preload(),
                    Forms\Components\Select::make('user_id')
                    ->relationship('user','name')
                    ->label('Diinput Oleh')
                    ->disabled()
                    ->default(Auth()->id()),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('pembagiankelas_id')
            ->columns([
                Tables\Columns\TextColumn::make('santri.nis')
                ->label('NIS'),
                Tables\Columns\TextColumn::make('santri.nama')
                ->label('Nama'),
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
