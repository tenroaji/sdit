<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenyusunanJadwalUjianResource\Pages;
use App\Filament\Resources\PenyusunanJadwalUjianResource\RelationManagers;
use App\Filament\Resources\PenyusunanJadwalUjianResource\RelationManagers\JadwalujiansRelationManager;
use App\Models\PenyusunanJadwalUjian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class PenyusunanJadwalUjianResource extends Resource
{
    protected static ?string $model = PenyusunanJadwalUjian::class;

    protected static ?string $navigationIcon = 'heroicon-s-document-check';
    protected static ?string $modelLabel = 'Penyusunan Jadwal Ujian';
    protected static ?string $navigationLabel = 'Penyusunan Jadwal Ujian';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->maxLength(4),
                Forms\Components\TextInput::make('semester')
                    ->required()
                    ->numeric(),
                Forms\Components\Select::make('tingkat_id')
                    ->label('Kelas')
                    ->relationship('tingkat','nama')
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('ujian_id')
                ->label('Ujian')
                ->relationship('ujian','nama')
                ->searchable()
                ->preload(),
                Forms\Components\Select::make('user_id')
                ->label('Diinput Oleh')
                ->relationship('user','name')
                ->disabled()
                ->default(Auth()->id()),
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
                Tables\Columns\TextColumn::make('tingkat_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ujian_id')
                    ->numeric()
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
           JadwalujiansRelationManager::class,
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenyusunanJadwalUjians::route('/'),
            'create' => Pages\CreatePenyusunanJadwalUjian::route('/create'),
            'edit' => Pages\EditPenyusunanJadwalUjian::route('/{record}/edit'),
        ];
    }    
}
