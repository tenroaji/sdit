<?php

namespace App\Filament\Resources\SantriResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiwayatprestasiRelationManager extends RelationManager
{
    protected static string $relationship = 'riwayatprestasi';
    protected static ?string $modelLabel = 'Data Prestasi Santri';
    protected static ?string $title = 'Data Prestasi Santri';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('prestasi')
                ->label('Nama Prestasi'),
                Forms\Components\TextInput::make('tahun')
                ->label('Tahun'),
                Forms\Components\TextInput::make('tingkat')
                ->label('Tingkat'),
                Forms\Components\TextInput::make('dokpres1')
                ->label('Hasil Prestasi'),
                Forms\Components\FileUpload::make('dokpres2')
                ->label('Foto Hasil'),
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
                Tables\Columns\TextColumn::make('prestasi'),
                Tables\Columns\TextColumn::make('tahun'),
                Tables\Columns\TextColumn::make('tingkat'),

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
