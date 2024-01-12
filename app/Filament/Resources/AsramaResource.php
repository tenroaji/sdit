<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AsramaResource\Pages;
use App\Filament\Resources\AsramaResource\RelationManagers;
use App\Filament\Resources\AsramaResource\RelationManagers\KamarRelationManager;
use App\Models\Asrama;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AsramaResource extends Resource
{
    protected static ?string $model = Asrama::class;

    protected static ?string $navigationIcon = 'heroicon-s-building-office-2';
    protected static ?string $modelLabel = 'Asrama dan Kamar';
    protected static ?string $navigationLabel = 'Asrama dan Kamar';
    protected static ?string $navigationGroup = 'Data Referensi Sekolah';
    protected static ?int $navigationSort = 1;
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('lokasi')
                    ->maxLength(255),
                Forms\Components\TextInput::make('daya_muat')
                    ->numeric(),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('foto')
                ->disk('public_images')
                ->preserveFilenames()
                    ,

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lokasi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('daya_muat')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('foto')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            KamarRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAsramas::route('/'),
            'create' => Pages\CreateAsrama::route('/create'),
            'edit' => Pages\EditAsrama::route('/{record}/edit'),
        ];
    }
}
