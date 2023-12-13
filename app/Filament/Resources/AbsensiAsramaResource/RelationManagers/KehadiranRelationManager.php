<?php

namespace App\Filament\Resources\AbsensiAsramaResource\RelationManagers;

use App\Models\Santri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KehadiranRelationManager extends RelationManager
{
    protected static string $relationship = 'kehadiran';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('santri_id')
                ->relationship('santri','nama')
                ->preload()
                ->searchable()
                ->label('Santri'),
                Forms\Components\Toggle::make('status_hadir'),
                Forms\Components\Select::make('user_id')
                ->relationship('user','name')
                ->disabled()
                ->default(Auth()->id())
                ->label('Diinput Oleh'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('absensiasrama_id')
            ->columns([
                Tables\Columns\TextColumn::make('santri.nama')
                ->label('Santri'),
                Tables\Columns\ToggleColumn::make('status_hadir')
                ,
                Tables\Columns\TextColumn::make('user.name')
                ->label('Diinput Oleh')
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
