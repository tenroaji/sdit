<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterNilaiResource\Pages;
use App\Filament\Resources\MasterNilaiResource\RelationManagers;
use App\Filament\Resources\MasterNilaiResource\RelationManagers\NilaisantriRelationManager;
use App\Models\Kelas;
use App\Models\MasterNilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\SelectFilter;
class MasterNilaiResource extends Resource
{
    protected static ?string $model = MasterNilai::class;

    protected static ?string $navigationIcon = 'heroicon-s-pencil-square';
    protected static ?string $modelLabel = 'Pemasukan Nilai Santri';
    protected static ?string $navigationLabel = 'Pemasukan Nilai Santri';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 7;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('kelas_id')
                    ->relationship('kelas','nama')
                    ->preload()
                    ->searchable()
                    ->label('Kelas'),
                    Forms\Components\Select::make('jenisnilai_id')
                    ->relationship('jenisnilai','nama')
                    ->preload()
                    ->searchable()
                    ->label('Jenis Nilai'),
                Forms\Components\Select::make('matapelajaran_id')
                ->relationship('matapelajaran','nama')
                ->preload()
                ->searchable()
                ->label('Mata Pelajaran'),
                Forms\Components\TextInput::make('capaian_pembelajaran')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun')
                    ->maxLength(255),
                Forms\Components\TextInput::make('semester')
                    ->maxLength(255),
                Forms\Components\Select::make('guru_id')
                ->relationship('guru','nama')
                ->preload()
                ->searchable()
                ->label('Guru'),
                Forms\Components\Select::make('user_id')
                    ->default(Auth()->id())
                    ->disabled()
                    ->relationship('user','name')
                    ->label('Diinput Oleh'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kelas.nama')
                ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('matapelajaran.nama')
                ->searchable()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('capaian_pembelajaran')
                ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('semester')
                    ->searchable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->label('Guru')
                    ->searchable()
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
                SelectFilter::make('kelas_id')
                    ->label('Nama Kelas')
                    ->options(function () {
                        return Kelas::pluck('nama','id')->toArray();
                    }),
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
            NilaisantriRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMasterNilais::route('/'),
            'create' => Pages\CreateMasterNilai::route('/create'),
            'edit' => Pages\EditMasterNilai::route('/{record}/edit'),
        ];
    }
}
