<?php

namespace App\Filament\Resources\PegawaiResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JabatanRelationManager extends RelationManager
{
    protected static string $relationship = 'jabatan';
    protected static ?string $title = 'Jabatan Pegawai';
    protected static ?string $modelLabel = 'Jabatan Pegawai';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jabatan_id')
                    ->label('Jabatan')
                    ->relationship('jabatan','nama')
                    ->preload()
                    ->searchable(),
                    Forms\Components\DatePicker::make('tanggal')
                    ->label('Tanggal Mulai Menjabat'),
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
            // ->recordTitleAttribute('pegawai_id')
            ->columns([
                Tables\Columns\TextColumn::make('jabatan.nama'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date(),
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
