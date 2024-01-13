<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenilaianKinerjaResource\Pages;
use App\Filament\Resources\PenilaianKinerjaResource\RelationManagers;
use App\Models\PenilaianKinerja;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenilaianKinerjaResource extends Resource
{
    protected static ?string $model = PenilaianKinerja::class;

    protected static ?string $pluralModelLabel = 'Penilaian Kinerja';
    protected static ?string $modelLabel = 'Penilaian Kinerja';
    protected static ?string $navigationLabel = 'Penilaian Kinerja';
    protected static ?string $navigationGroup = 'Administrasi Kepegawaian';
    protected static ?int $navigationSort = 11;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                    Forms\Components\Select::make('id_ref_kompetensi_gurus')
                    ->searchable()
                    ->preload()
                    ->relationship('refKompetensiGuru','nama_kompetensi'),
                    Forms\Components\Select::make('guru_id')
                    ->searchable()
                    ->preload()
                    ->relationship('guru','nama'),
                Forms\Components\DatePicker::make('periode_awal'),
                Forms\Components\DatePicker::make('periode_akhir'),
                Forms\Components\TextInput::make('nilai')
                    ->numeric(),
                Forms\Components\TextInput::make('proporsi')
                    ->numeric(),
                Forms\Components\TextInput::make('nilai_akhir')
                    ->numeric(),
                Forms\Components\TextInput::make('penilai')
                    ->maxLength(255),
                Forms\Components\Select::make('user_id')
                ->preload()
                ->default(Auth()->id())
                ->disabled()
                ->relationship('user','name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('refKompetensiGuru.nama_kompetensi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periode_awal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('periode_akhir')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nilai')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('proporsi')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nilai_akhir')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('penilai')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
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
            'index' => Pages\ListPenilaianKinerjas::route('/'),
            'create' => Pages\CreatePenilaianKinerja::route('/create'),
            'edit' => Pages\EditPenilaianKinerja::route('/{record}/edit'),
        ];
    }
}
