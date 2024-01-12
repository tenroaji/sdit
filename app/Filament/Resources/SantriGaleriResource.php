<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SantriGaleriResource\Pages;
use App\Filament\Resources\SantriGaleriResource\RelationManagers;
use App\Models\SantriGaleri;
use Filament\Forms;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SantriGaleriResource extends Resource
{
    protected static ?string $model = SantriGaleri::class;
    protected static ?string $pluralModelLabel = 'Galeri Santri';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('santri_id')
                ->relationship('santri','nama')
                ->preload()
                ->label('Nama Santri')
                ->searchable(),
                Forms\Components\FileUpload::make('media')
                    ,
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                    Forms\Components\Select::make('kelas_id')
                    ->relationship('kelas','nama')
                    ->preload()
                    ->label('Nama Kelas')
                    ->searchable(),
                Forms\Components\Select::make('user_id')
                ->relationship('user','name')
                ->label('Diinput Oleh')
                ->default(Auth()->id())
                ->disabled(),
                Forms\Components\DatePicker::make('tanggal'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('santri.nama')
                    ->numeric()
                    ->sortable(),
            //   ImageColumn::make('media')
            //     ,
                // Tables\Columns\TextColumn::make('media')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('kelas.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
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
            'index' => Pages\ListSantriGaleris::route('/'),
            'create' => Pages\CreateSantriGaleri::route('/create'),
            'edit' => Pages\EditSantriGaleri::route('/{record}/edit'),
        ];
    }
}
