<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ModulTahfizResource\Pages;
use App\Filament\Resources\ModulTahfizResource\RelationManagers;
use App\Models\ModulTahfiz;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ModulTahfizResource extends Resource
{
    protected static ?string $model = ModulTahfiz::class;


    protected static ?string $navigationIcon = 'heroicon-s-chat-bubble-left-ellipsis';
    protected static ?string $modelLabel = 'Setoran Hafalan';
    protected static ?string $navigationLabel = 'Setoran Hafalan';
    protected static ?string $navigationGroup = 'Kegiatan Sekolah';
    protected static ?int $navigationSort = 1;

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('santri_id')
                    ->relationship('santri','nama')
                    ->preload()
                    ->label('Nama Santri')
                    ->searchable(),
                Forms\Components\DatePicker::make('tanggal_setor')
                    ->label('Tanggal Setor Hafalan'),
                Forms\Components\Select::make('surah_id')
                    ->relationship('surah','nama')
                    ->label('Surah')
                    ->preload()
                    ->searchable(),
                Forms\Components\TextInput::make('juz')
                    ->numeric(),
                Forms\Components\TextInput::make('ayat_start')
                    ->label('Dari ayat')
                    ->numeric(),
                Forms\Components\TextInput::make('ayat_end')
                    ->label('Hingga ayat')
                    ->numeric(),
                Forms\Components\TextInput::make('hasil_tes')
                    ->label('Catatan Penilaian')
                    ->maxLength(255),
                Forms\Components\Select::make('guru_id')
                    ->relationship('guru','nama')
                    ->label('Guru Tahfidz')
                    ->preload()
                    ->searchable(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user','name')
                    ->label('Diinput Oleh')
                    ->default(Auth()->id())
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('santri.nama')
                    ->label('Nama Santri')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal_setor')
                    ->label('Tanggal Setoran')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('surah.nama')
                    ->label('Surah')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('juz')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ayat_start')
                    ->label('Dari Ayat :')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ayat_end')
                    ->label('Hingga Ayat :')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('hasil_tes')
                    ->label('Penilaian')
                    ->searchable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->label('Nama Guru')
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
            'index' => Pages\ListModulTahfizs::route('/'),
            'create' => Pages\CreateModulTahfiz::route('/create'),
            'edit' => Pages\EditModulTahfiz::route('/{record}/edit'),
        ];
    }    
}
