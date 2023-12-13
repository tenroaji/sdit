<?php

namespace App\Filament\Resources\SantriResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WaliRelationManager extends RelationManager
{
    protected static string $relationship = 'wali';
    protected static ?string $modelLabel = 'Data wali Santri';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('wali')
                ->label('Nama Wali'),
                Forms\Components\TextInput::make('kerja_wali')
                ->label('Pekerjaan Wali'),
                Forms\Components\TextInput::make('telp_wali')
                ->label('No Telpon Wali'),
                Forms\Components\TextInput::make('alamat'),
                // Forms\Components\select::make('kota_id')
                // ->relationship('kota','nama')
                // ->preload()
                // ->searchable(),
                Forms\Components\TextInput::make('catatan'),
                Forms\Components\Select::make('user_id')
                ->default(Auth()->id())
                ->label('Diinput Oleh')
                ->relationship('user','name'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // ->recordTitleAttribute('santri_id')
            ->columns([
                Tables\Columns\TextColumn::make('wali'),
                Tables\Columns\TextColumn::make('telp_wali')
                ->label('Nomor Telepon'),
                Tables\Columns\TextColumn::make('kerja_wali')
                ->label('Pekerjaan'),
                Tables\Columns\TextColumn::make('alamat'),
                Tables\Columns\TextColumn::make('kota.nama')
                ->label('Kota'),
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
