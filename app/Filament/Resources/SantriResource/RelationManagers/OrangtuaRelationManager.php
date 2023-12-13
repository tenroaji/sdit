<?php

namespace App\Filament\Resources\SantriResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Forms\Components\select;

class OrangtuaRelationManager extends RelationManager
{
    protected static string $relationship = 'orangtua';
    protected static ?string $modelLabel = 'Data Orang Tua Santri';
    protected static ?string $title = 'Data Orang Tua Santri';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('ayah')
                ->label('Nama Ayah'),
                Forms\Components\TextInput::make('kerja_ayah')
                ->label('Pekerjaan Ayah'),
                Forms\Components\TextInput::make('telp_ayah')
                ->label('No Telpon Ayah'),
                Forms\Components\TextInput::make('ibu')
                ->label('Nama Ibu'),
                Forms\Components\TextInput::make('kerja_ibu')
                ->label('Pekerjaan Ibu'),
                Forms\Components\TextInput::make('telp_ibu')
                ->label('No Telpon Ibu'),
                Forms\Components\TextInput::make('alamat'),
                // select::make('kota_id')
                // ->relationship('kota','nama')
                // ->preload()
                // ->searchable(),
                Forms\Components\TextInput::make('anak_ke'),
                Forms\Components\TextInput::make('penghasilan'),
                Forms\Components\TextInput::make('kartukeluarga1')
                ->label('Nomor KK'),
                Forms\Components\FileUpload::make('kartukeluarga2')
                ->label('Foto KK'),
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
            // ->recordTitleAttribute('ayah')
            ->columns([
                Tables\Columns\TextColumn::make('ayah'),
                Tables\Columns\TextColumn::make('ibu'),
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('kota.nama')
                ->label('Kota'),
                Tables\Columns\TextColumn::make('anak_ke'),
                Tables\Columns\TextColumn::make('penghasilan'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->label('Edit Data'),
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
