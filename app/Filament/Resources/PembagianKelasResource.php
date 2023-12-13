<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembagianKelasResource\Pages;
use App\Filament\Resources\PembagianKelasResource\RelationManagers;
use App\Filament\Resources\PembagianKelasResource\RelationManagers\SantrisRelationManager;
use App\Models\PembagianKelas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembagianKelasResource extends Resource
{
    protected static ?string $model = PembagianKelas::class;

    protected static ?string $navigationIcon = 'heroicon-s-building-storefront';
    protected static ?string $modelLabel = 'Penentuan Ruang Kelas Santri';
    protected static ?string $navigationLabel = 'Penentuan Ruang Kelas Santri';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->maxLength(4),
                Forms\Components\Select::make('tingkat_id')
                    ->label('Kelas ')
                    ->searchable()
                    ->preload()
                    ->relationship('tingkat','nama'),
                Forms\Components\Select::make('kelas_id')
                    ->label('Ruangan Kelas ')
                    ->searchable()
                    ->preload()
                    ->relationship('kelas','nama'),
                    Forms\Components\Select::make('user_id')
                        ->relationship('user','name')
                        ->label('Diinput oleh')
                        ->disabled()
                        ->default(Auth()->id()),
                Forms\Components\Textarea::make('deskripsi')
                    ->label('Catatan')
                    ->maxLength(65535)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tingkat.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelas.nama')
                ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            SantrisRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembagianKelas::route('/'),
            'create' => Pages\CreatePembagianKelas::route('/create'),
            'edit' => Pages\EditPembagianKelas::route('/{record}/edit'),
        ];
    }    
}
