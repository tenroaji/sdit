<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerangkatAjarResource\Pages;
use App\Filament\Resources\PerangkatAjarResource\RelationManagers;
use App\Models\PerangkatAjar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PerangkatAjarResource extends Resource
{
    protected static ?string $model = PerangkatAjar::class;

    protected static ?string $pluralModelLabel = 'Perangkat Ajar';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('nama')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('media')
                    ->disk('public_images')
                    ->preserveFilenames(),
                Forms\Components\Select::make('guru_id')
                ->label('Diinput Oleh')
                ->relationship('guru','nama')
                ->default(Auth()->id()),

                Forms\Components\Select::make('user_id')
                ->label('Diinput Oleh')
                ->relationship('user','name')
                ->default(Auth()->id()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('media')
                //     ->searchable(),
                    Tables\Columns\TextColumn::make('guru.nama')
                    ->label('Penginput')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ViewColumn::make('media')
                    ->view('tables.columns.open-file'),
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
            'index' => Pages\ListPerangkatAjars::route('/'),
            'create' => Pages\CreatePerangkatAjar::route('/create'),
            'edit' => Pages\EditPerangkatAjar::route('/{record}/edit'),
        ];
    }
}
