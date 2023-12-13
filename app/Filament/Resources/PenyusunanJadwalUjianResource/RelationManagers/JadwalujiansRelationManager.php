<?php

namespace App\Filament\Resources\PenyusunanJadwalUjianResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class JadwalujiansRelationManager extends RelationManager
{
    protected static string $relationship = 'jadwalujians';
    protected static ?string $title = 'Jadwal Ujian';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('tanggal'),
                Forms\Components\Select::make('jam_id')
                ->preload()
                ->searchable()
                ->relationship('jam','nama'),
                Forms\Components\Select::make('matapelajaran_id')
                ->preload()
                ->searchable()
                ->relationship('matapelajaran','nama'),
                Forms\Components\Select::make('user_id')
                ->label('Diinput Oleh')
                ->relationship('user','name')
                ->default(Auth()->id())
                ->disabled(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('penyusunanjadwal_id')
            ->columns([
                Tables\Columns\TextColumn::make('tanggal')
                ->date()
                ->label('Tanggal'),
                Tables\Columns\TextColumn::make('jam.nama')
                ->label('Jam'),
                Tables\Columns\TextColumn::make('matapelajaran.nama')
                ->label('Mata Pelajaran'),
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
