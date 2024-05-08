<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenyusunanKegiatanResource\Pages;
use App\Filament\Resources\PenyusunanKegiatanResource\RelationManagers;
use App\Filament\Resources\PenyusunanKegiatanResource\RelationManagers\SantrisRelationManager;
use App\Models\PenyusunanKegiatan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenyusunanKegiatanResource extends Resource
{
    protected static ?string $model = PenyusunanKegiatan::class;

    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-left-ellipsis';
    protected static ?string $modelLabel = 'Kegiatan Kokurikuler';
    protected static ?string $navigationLabel = 'Kegiatan Kokurikuler';
    protected static ?string $navigationGroup = 'Kegiatan Sekolah';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('tanggal_mulai'),
                Forms\Components\DateTimePicker::make('tanggal_selesai'),
                Forms\Components\TextInput::make('nama_kegiatan')
                    ->maxLength(255),
                    Forms\Components\Select::make('jeniskegiatan_id')
                    ->relationship('jeniskegiatan','nama')
                    ->preload()
                    ->searchable()
                    ->label('Jenis Kegiatan'),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user','name')
                    ->label('Diinput Oleh')
                    ->disabled()
                    ->default(Auth()->id())
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tanggal_mulai')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_selesai')
                    ->dateTime()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('jeniskegiatan.nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_kegiatan')
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
            SantrisRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPenyusunanKegiatans::route('/'),
            'create' => Pages\CreatePenyusunanKegiatan::route('/create'),
            'edit' => Pages\EditPenyusunanKegiatan::route('/{record}/edit'),
        ];
    }
}
