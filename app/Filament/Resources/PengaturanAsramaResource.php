<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaturanAsramaResource\Pages;
use App\Filament\Resources\PengaturanAsramaResource\RelationManagers;
use App\Filament\Resources\PengaturanAsramaResource\RelationManagers\SantrisRelationManager;
use App\Models\PengaturanAsrama;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengaturanAsramaResource extends Resource
{
    protected static ?string $model = PengaturanAsrama::class;

    protected static ?string $navigationIcon = 'heroicon-s-building-storefront';
    protected static ?string $modelLabel = 'Penentuan Asrama Santri';
    protected static ?string $navigationLabel = 'Penentuan Asrama Santri';
    protected static ?string $navigationGroup = 'Manajemen Asrama';
    protected static ?int $navigationSort = 1;
    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->label('Tahun Masuk Asrama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('semester')
                    ->maxLength(255),
                Forms\Components\Select::make('kamarasrama_id')
                    ->label('Kamar Asrama')
                    ->relationship('kamar','nama')
                    ->preload()
                    ->searchable(),
                Forms\Components\Select::make('user_id')
                ->label('Diinput Oleh')
                ->disabled()
                ->default(Auth()->id())
                ->relationship('user','name')
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('semester')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kamar.nama')
                    ->label('Kamar Asrama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Diinput Oleh')
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
            'index' => Pages\ListPengaturanAsramas::route('/'),
            'create' => Pages\CreatePengaturanAsrama::route('/create'),
            'edit' => Pages\EditPengaturanAsrama::route('/{record}/edit'),
        ];
    }
}
