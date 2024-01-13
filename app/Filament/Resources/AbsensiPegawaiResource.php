<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AbsensiPegawaiResource\Pages;
use App\Filament\Resources\AbsensiPegawaiResource\RelationManagers;
use App\Models\AbsensiPegawai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class AbsensiPegawaiResource extends Resource
{
    protected static ?string $model = AbsensiPegawai::class;
    protected static ?string $navigationIcon = 'heroicon-s-building-office-2';
    protected static ?string $modelLabel = 'Absensi Pegawai, Staf dan Wali Kelas';
    protected static ?string $navigationLabel = 'Absensi Pegawai, Staf dan Wali Kelas';
    protected static ?string $navigationGroup = 'Administrasi Kepegawaian';
    protected static ?int $navigationSort = 10;



    public static function form(Form $form): Form
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('asrama.nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kamarasrama.nama')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
