<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RefKompetensiGuruResource\Pages;
use App\Filament\Resources\RefKompetensiGuruResource\RelationManagers;
use App\Models\RefKompetensiGuru;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RefKompetensiGuruResource extends Resource
{
    protected static ?string $model = RefKompetensiGuru::class;

    protected static ?string $pluralModelLabel = 'Ref Kompetensi Guru';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kompetensi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_kompetensi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('cara_menilai')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('keterangan')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama_kompetensi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jenis_kompetensi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cara_menilai')
                    ->searchable(),
                Tables\Columns\TextColumn::make('keterangan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRefKompetensiGurus::route('/'),
            'create' => Pages\CreateRefKompetensiGuru::route('/create'),
            'edit' => Pages\EditRefKompetensiGuru::route('/{record}/edit'),
        ];
    }
}
