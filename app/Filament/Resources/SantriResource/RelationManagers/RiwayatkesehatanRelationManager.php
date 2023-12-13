<?php

namespace App\Filament\Resources\SantriResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RiwayatkesehatanRelationManager extends RelationManager
{
    protected static string $relationship = 'riwayatkesehatan';
    protected static ?string $modelLabel = 'Riwayat Kesehatan Santri';
    protected static ?string $title = 'Riwayat Kesehatan Santri';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('penyakit')
                ->label('Penyakit Pernah Diderita'),
                Forms\Components\TextInput::make('tahun')
                ->label('Tahun'),
                Forms\Components\TextInput::make('dokter')
                ->label('Dokter yang Menangani'),
                Forms\Components\TextInput::make('opname')
                ->label('Keterangan Opname'),
                Forms\Components\FileUpload::make('dokkes1')
                ->label('Surat Keterangan Sakit'),
                Forms\Components\FileUpload::make('dokkes2')
                ->label('Surat Keterangan Opname'),
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
                Tables\Columns\TextColumn::make('penyakit'),
                Tables\Columns\TextColumn::make('tahun'),
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
