<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenentuanKelulusanResource\Pages;
use App\Filament\Resources\PenentuanKelulusanResource\RelationManagers;
use App\Filament\Resources\PenentuanKelulusanResource\RelationManagers\SantrisRelationManager;
use App\Models\PenentuanKelulusan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenentuanKelulusanResource extends Resource
{
    protected static ?string $model = PenentuanKelulusan::class;

    protected static ?string $navigationIcon = 'heroicon-s-academic-cap';
    protected static ?string $modelLabel = 'Penentuan Kelulusan Santri';
    protected static ?string $navigationLabel = 'Penentuan Kelulusan Santri';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('strata_id')
                    ->label('Jenjang Sekolah')
                    ->required()
                    ->relationship('strata','nama')
                    ->preload()
                    ->searchable(),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('user_id')
                    ->disabled()
                    ->relationship('user','name')
                    ->default(Auth()->id())
                    ->label('Diinput Oleh'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('strata.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Diinput Oleh')
                    ->searchable()
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
            'index' => Pages\ListPenentuanKelulusans::route('/'),
            'create' => Pages\CreatePenentuanKelulusan::route('/create'),
            'edit' => Pages\EditPenentuanKelulusan::route('/{record}/edit'),
        ];
    }    
}
