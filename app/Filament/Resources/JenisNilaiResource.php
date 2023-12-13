<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisNilaiResource\Pages;
use App\Filament\Resources\JenisNilaiResource\RelationManagers;
use App\Models\JenisNilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class JenisNilaiResource extends Resource
{
    protected static ?string $model = JenisNilai::class;

    protected static ?string $navigationIcon = 'heroicon-s-pencil-square';
    protected static ?string $modelLabel = 'Jenis Nilai';
    protected static ?string $navigationLabel = 'Jenis Nilai';
    protected static ?string $navigationGroup = 'Data Referensi Akademik';
    protected static ?int $navigationSort = 8;

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
                    ->default(Auth()->id())
                    ->relationship('user','name')
                    ->disabled()
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
            'index' => Pages\ListJenisNilais::route('/'),
            'create' => Pages\CreateJenisNilai::route('/create'),
            'edit' => Pages\EditJenisNilai::route('/{record}/edit'),
        ];
    }    
}
