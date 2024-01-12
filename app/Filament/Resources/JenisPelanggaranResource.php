<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisPelanggaranResource\Pages;
use App\Filament\Resources\JenisPelanggaranResource\RelationManagers;
use App\Models\JenisPelanggaran;
use Filament\Forms\Components\Select;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisPelanggaranResource extends Resource
{
    protected static ?string $model = JenisPelanggaran::class;

    protected static ?string $navigationIcon = 'heroicon-s-face-frown';
    protected static ?string $modelLabel = 'Jenis Reward/Punishment';
    protected static ?string $navigationLabel = 'Jenis Reward/Punishment';
    protected static ?string $navigationGroup = 'Data Referensi Sekolah';
    protected static ?int $navigationSort = 9;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama'),
                TextInput::make('Deskripsi'),
                Select::make('tipe')
                ->searchable()
                ->preload()
                    ->options([
                        'Punishment' => 'Punishment',
                        'Reward' => 'Reward'
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama'),
                TextColumn::make('deskripsi'),
                TextColumn::make('tipe'),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListJenisPelanggarans::route('/'),
            'create' => Pages\CreateJenisPelanggaran::route('/create'),
            'edit' => Pages\EditJenisPelanggaran::route('/{record}/edit'),
        ];
    }
}
