<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\AbsensiPegawai;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\AbsensiPegawaiResource\Pages;
use App\Filament\Resources\AbsensiPegawaiResource\RelationManagers;

class AbsensiPegawaiResource extends Resource
{
    protected static ?string $model = AbsensiPegawai::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Absensi Pegawai';
    protected static ?string $navigationLabel = 'Absensi Pegawai';
    protected static ?string $pluralModelLabel = 'Absensi Pegawai';
    protected static ?string $navigationGroup = 'Administrasi Kepegawaian';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('tanggal')
                    ->required(),
                Forms\Components\Select::make('id_pegawai')
                    ->relationship('pegawai','nama'),
                Forms\Components\Toggle::make('status_Kehadiran')
                    ->required(),
                Forms\Components\Textarea::make('alasan_absen')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('user_id')
                    ->numeric(),
                Forms\Components\TextInput::make('jenis_absen')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('verified_by')
                    ->numeric(),
                Forms\Components\Toggle::make('status_verifikasi')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        
        return $table
        ->modifyQueryUsing(function (Builder $query) {
            $user = Auth::user();
            if (!$user->hasRole('Super Admin')) {
                $query
                ->whereHas('pegawai', function ($query) {
                    $query->where("pegawais.email",Auth::user()->email);
                });

            }
        })
            ->columns([
                Tables\Columns\TextColumn::make('tanggal')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('id_pegawai')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status_Kehadiran')
                    ->boolean(),
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
                Tables\Columns\TextColumn::make('jenis_absen')
                    ->searchable(),
                Tables\Columns\TextColumn::make('verified_by')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status_verifikasi')
                    ->boolean(),
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
            'index' => Pages\ListAbsensiPegawais::route('/'),
            'create' => Pages\CreateAbsensiPegawai::route('/create'),
            'edit' => Pages\EditAbsensiPegawai::route('/{record}/edit'),
        ];
    }
}
