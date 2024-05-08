<?php

namespace App\Filament\Resources\PenyusunanRosterResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class RostersRelationManager extends RelationManager
{
    protected static string $relationship = 'rosters';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('hari_id')
                ->searchable()
                ->preload()
                ->label('Hari Sekolah')
                ->relationship('hari','nama'),
                Forms\Components\Select::make('jam_id')
                ->searchable()
                ->preload()
                ->label('Jam Pelajaran')
                ->relationship('jam','nama'),
                Forms\Components\Select::make('matapelajaran_id')
                ->searchable()
                ->preload()
                ->label('Mata Pelajaran')
                ->relationship('matapelajaran','nama'),
                Forms\Components\Select::make('guru_id')
                ->searchable()
                ->preload()
                ->label('Guru Yang Bertugas')
                ->relationship('guru','nama'),
                Forms\Components\Select::make('user_id')
                ->disabled()
                ->label('Diinput Oleh')
                ->relationship('user','name')
                ->default(Auth()->id()),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('penyusunanroster_id')
            ->columns([
                Tables\Columns\TextColumn::make('hari.nama')
                ->label('Hari Sekolah'),
                Tables\Columns\TextColumn::make('jam.nama')
                ->label('Jam Pelajaran'),
                Tables\Columns\TextColumn::make('matapelajaran.nama')
                ->label('Mata Pelajaran'),
                Tables\Columns\TextColumn::make('guru.nama')
                ->label('Guru'),
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
