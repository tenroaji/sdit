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
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('tanggal')
                    ->required(),
                Forms\Components\Select::make('id_pegawai')
                    ->label('Pegawai')
                    ->relationship('pegawai','nama'),
                Forms\Components\Toggle::make('status_Kehadiran')
                    ->label('Kehadiran')
                    ->default(0),
                Forms\Components\Select::make('jenis_absen')
                    ->label('Jenis Absen')
                    ->default('Tidak ada keterangan')
                    ->options([
                        'Sakit' => 'Saklt',
                        'Izin' => 'Izin',
                        'Cuti' => 'Cuti',
                        'Tugas Belajar' => 'Tugas Belajar',
                        'Tugas Dinas' => 'Tugas Dinas',
                        'Tidak ada keterangan' => 'Tidak ada keterangan'
                    ]),    
                Forms\Components\Textarea::make('alasan_absen')
                    ->label('Keterangan Ketidakhadiran')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Select::make('user_id')
                    ->disabled()
                    ->relationship('user','name')
                    ->default(Auth()->id())
                    ->label('Diinput Oleh'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
