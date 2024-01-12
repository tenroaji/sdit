<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PembayaranBiayaPendaftaranResource\Pages;
use App\Filament\Resources\PembayaranBiayaPendaftaranResource\RelationManagers;
use App\Models\PembayaranBiayaPendaftaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PembayaranBiayaPendaftaranResource extends Resource
{
    protected static ?string $model = PembayaranBiayaPendaftaran::class;

    protected static ?string $navigationIcon = 'heroicon-s-banknotes';
    protected static ?string $modelLabel = 'Administrasi Pendaftaran';
    protected static ?string $navigationLabel = 'Administrasi Pendaftaran';
    protected static ?string $navigationGroup = 'Keuangan Akademik';
    protected static ?int $navigationSort = 4;
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('periodependaftaran_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('tahun')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->maxLength(255),
                Forms\Components\TextInput::make('kota_id')
                    ->numeric(),
                Forms\Components\TextInput::make('gender')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('tanggal_lahir'),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('no_telpon')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('foto')
                    ->maxLength(255),
                Forms\Components\TextInput::make('strata_id')
                    ->numeric(),
                Forms\Components\Toggle::make('status_bayar_biaya')
                    ->required(),
                Forms\Components\Toggle::make('status_terima')
                    ->required(),
                Forms\Components\TextInput::make('user_id')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table->modifyQueryUsing(function (Builder $query) {
            // Gunakan scopeUnpaid dari model RawPembayaran
            $query->unpaid();
        })

            ->defaultGroup('periode.tahun')
            ->columns([
                Tables\Columns\TextColumn::make('periode.tahun')
                    ->label('Tahun')
                    ->searchable()
                    ->sortable(),
                // Tables\Columns\TextColumn::make('tahun')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('strata.nama')
                    ->label('Jenjang Pendidikan')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status_bayar_biaya')
                    ->boolean(),
                    Tables\Columns\TextColumn::make('periode.biaya')
                    ->label('Biaya Pendaftaran')
                    ->money('idr'),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),

                Tables\Columns\IconColumn::make('status_terima')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('user_id')
                //     ->numeric()
                //     ->sortable(),
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
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                // Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListPembayaranBiayaPendaftarans::route('/'),
            // 'create' => Pages\CreatePembayaranBiayaPendaftaran::route('/create'),
            // 'edit' => Pages\EditPembayaranBiayaPendaftaran::route('/{record}/edit'),
        ];
    }
}
