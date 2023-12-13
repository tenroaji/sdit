<?php

namespace App\Filament\Resources\SantriResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiwayatsekolahRelationManager extends RelationManager
{
    protected static string $relationship = 'riwayatsekolah';
    protected static ?string $modelLabel = 'Data Sekolah Santri';
    protected static ?string $title = 'Data Sekolah Santri';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('asal_sekolah')
                ->label('Nama Sekolah'),
                Forms\Components\Select::make('strata_id')
                ->relationship('strata','nama')
                ->preload()
                ->searchable()
                ->label('Jenjang'),
                Forms\Components\TextInput::make('lulus_tahun'),
                Forms\Components\TextInput::make('dokumen1')
                ->label('Nomor Ijasah'),
                Forms\Components\TextInput::make('dokumen2')
                ->label('Tahun Ijasah'),
                Forms\Components\FileUpload::make('dokumen3')
                ->label('Foto Ijasah'),
                Forms\Components\TextInput::make('catatan'),
                Forms\Components\Select::make('user_id')
                ->default(Auth()->id())
                ->label('Diinput Oleh')
                ->relationship('user','name')
                ->disabled(),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // ->recordTitleAttribute('santri_id')
            ->columns([
                Tables\Columns\TextColumn::make('asal_sekolah'),
                Tables\Columns\TextColumn::make('strata.nama'),
                Tables\Columns\TextColumn::make('lulus_tahun'),
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
