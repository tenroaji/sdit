<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisUjianResource\Pages;
use App\Filament\Resources\JenisUjianResource\RelationManagers;
use App\Models\JenisUjian;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JenisUjianResource extends Resource
{
    protected static ?string $model = JenisUjian::class;

    protected static ?string $navigationIcon = 'heroicon-s-pencil-square';
    protected static ?string $modelLabel = 'Jenis Ujian';
    protected static ?string $navigationLabel = 'Jenis-jenis Ujian';
    protected static ?string $navigationGroup = 'Data Referensi Akademik';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
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
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJenisUjians::route('/'),
            'create' => Pages\CreateJenisUjian::route('/create'),
            'edit' => Pages\EditJenisUjian::route('/{record}/edit'),
        ];
    }
}
