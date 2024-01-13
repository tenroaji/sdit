<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbsensiPegawaiVerificationResource\Pages;
use App\Filament\Resources\AbsensiPegawaiVerificationResource\RelationManagers;
use App\Models\AbsensiPegawaiVerification;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ToggleColumn;

class AbsensiPegawaiVerificationResource extends Resource
{
    protected static ?string $model = AbsensiPegawaiVerification::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ToggleColumn::make('status_verifikasi'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('pegawai.nama')
                    ->label('Pegawai')
                    ->sortable(),
                Tables\Columns\IconColumn::make('status_kehadiran')
                    ->label('Status Kehadiran')
                    ->boolean(),
                Tables\Columns\TextColumn::make('jenis_absen')
                    ->label('Jenis Absen'),
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
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListAbsensiPegawaiVerifications::route('/'),
            'create' => Pages\CreateAbsensiPegawaiVerification::route('/create'),
            'edit' => Pages\EditAbsensiPegawaiVerification::route('/{record}/edit'),
        ];
    }
}
