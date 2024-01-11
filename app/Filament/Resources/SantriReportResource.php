<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Pages\ViewUser;
use Filament\Tables;
use App\Models\Absensi;
use Filament\Infolists;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\SantriReport;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Infolists\Components\TextEntry;
use Filament\Forms\Components\Toggle;
use Filament\Support\Enums\FontWeight;
use Filament\Infolists\Components\Grid;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\Group;
use Filament\Infolists\Components\Split;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Forms\Components\DateTimePicker;
use Filament\Infolists\Components\RepeatableEntry;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SantriReportResource\Pages;
use App\Filament\Resources\SantriReportResource\RelationManagers;
use App\Models\AbsensiAsrama;
use App\Models\AbsensiAsramaSantri;
use App\Models\Pelanggaran;

class SantriReportResource extends Resource
{
    protected static ?string $model = SantriReport::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Ikhwal Santri';
    protected static ?string $navigationLabel = 'Ikhwal Santri';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nis')
                    ->required()
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
                Forms\Components\TextInput::make('tingkat_id')
                    ->numeric(),
                Forms\Components\TextInput::make('kelas_id')
                    ->numeric(),
                Forms\Components\TextInput::make('strata_id')
                    ->numeric(),
                Forms\Components\Toggle::make('status_aktif')
                    ->required(),
                Forms\Components\TextInput::make('user_id')
                    ->numeric(),
                Forms\Components\TextInput::make('tahun')
                    ->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nis')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tingkat_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelas_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('strata_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\IconColumn::make('status_aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),

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
                Tables\Actions\ViewAction::make()
                ->label('Lihat Ikhwal Santri'),
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
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([

                Section::make()
                    ->schema([
                        Split::make([
                            Grid::make(2)
                                ->schema([

                                    Group::make([
                                        Infolists\Components\TextEntry::make('nis')
                                            // ->markdown()
                                            ->inlineLabel()
                                            ->label('NIS :')
                                            ->prose(),
                                        Infolists\Components\TextEntry::make('nama')
                                            ->label('Nama :')
                                            ->inlineLabel()
                                            ->weight(FontWeight::Bold),
                                    ]),
                                    Group::make([
                                        Infolists\Components\TextEntry::make('tingkat.nama')
                                            ->label('Kelas :')
                                            ->inlineLabel(),
                                        Infolists\Components\TextEntry::make('kelas.nama')
                                            ->label('Ruang Kelas :')
                                            ->inlineLabel(),
                                        Infolists\Components\TextEntry::make('strata.nama')
                                            ->label('Jenjang :')
                                            ->inlineLabel(),
                                    ]),
                                ]),
                            Infolists\Components\ImageEntry::make('foto')
                                ->width(100)
                                ->height(150)
                                ->hiddenLabel()
                                ->grow(false)
                                ->disk('public_images'),
                        ])->from('lg'),

                    ]),
                    Section::make('Dana Wakaf Bulanan (DWB)')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        RepeatableEntry::make('pembayaran')
                            ->schema([
                                Infolists\Components\TextEntry::make('updated_at')
                                ->date()
                                ->label('Tanggal'),
                                Infolists\Components\TextEntry::make('bulan')
                                ->label('Bulan'),
                                Infolists\Components\TextEntry::make('tahun')
                                ->label('Tahun'),
                                Infolists\Components\IconEntry::make('status_bayar')
                                ->label('Status Lunas')
                                ->boolean(),
                                Infolists\Components\TextEntry::make('metode_bayar')
                                ->label('Cara'),
                                Infolists\Components\TextEntry::make('nilai_bayar')
                                ->label('Jumlah')
                                ->money('idr'),
                                Infolists\Components\TextEntry::make('sisa_bayar')
                                ->label('Sisa'),
                            ])->columns(7),
                    ]),

                    Section::make('Raport (Nilai Akademik)')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        RepeatableEntry::make('nilai')
                            ->schema([
                                Infolists\Components\TextEntry::make('updated_at')
                                ->label('Tanggal Input')
                                ->date(),
                                Infolists\Components\TextEntry::make('masternilai.kelas.nama')
                                ->label('Kelas'),
                                Infolists\Components\TextEntry::make('masternilai.tahun')
                                ->label('Tahun'),
                                Infolists\Components\TextEntry::make('masternilai.semester')
                                ->label('Semester'),
                                Infolists\Components\TextEntry::make('masternilai.jenisnilai.nama')
                                ->label('Jenis Nilai'),
                                Infolists\Components\TextEntry::make('masternilai.matapelajaran.nama')
                                ->label('Mata Pelajaran'),
                                Infolists\Components\TextEntry::make('nilai'),

                            ])->columns(7),
                    ]),
                    Section::make('Kegiatan Kokurikuler dan Extrakurikuler')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        RepeatableEntry::make('kegiatan')
                            ->schema([
                                Infolists\Components\TextEntry::make('kegiatan.tanggal_mulai')
                                ->date()
                                ->label('Tanggal Mulai'),
                                Infolists\Components\TextEntry::make('kegiatan.tanggal_selesai')
                                ->date()
                                ->label('Tanggal Selesai'),
                                Infolists\Components\TextEntry::make('kegiatan.jeniskegiatan.nama')
                                ->label('Jenis Kegiatan'),
                                Infolists\Components\TextEntry::make('kegiatan.nama_kegiatan')
                                ->label('Kegiatan'),
                                Infolists\Components\TextEntry::make('peranan'),
                                Infolists\Components\TextEntry::make('catatan'),
                            ])->columns(6),
                    ]),
                    Section::make('Kegiatan Tahfidz')
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        RepeatableEntry::make('tahfiz')
                            ->schema([
                                Infolists\Components\TextEntry::make('tanggal_setor')
                                ->date()
                                ->label('Tgl Setor Hafalan'),
                                Infolists\Components\TextEntry::make('surah.nama')
                                ->label('Surah'),
                                Infolists\Components\TextEntry::make('juz')
                                ->label('Jus'),
                                Infolists\Components\TextEntry::make('ayat_start')
                                ->label('Dari ayat ke'),
                                Infolists\Components\TextEntry::make('ayat_end')
                                ->label('Sampai ayat ke'),
                                Infolists\Components\TextEntry::make('hasil_tes')
                                ->label('Catatan Penilaian'),
                                Infolists\Components\TextEntry::make('guru.nama')
                                ->label('Guru Pembimbing'),
                            ])->columns(6),
                    ]),

                Section::make('Kedisiplinan (Reward and Punishment)')
                ->collapsible()
                ->collapsed()
                    ->schema([
                        Grid::make(2)
                        ->schema([
                        // RepeatableEntry::make('absensi')
                        //     ->schema([
                        //         Infolists\Components\TextEntry::make('masterabsensi_id'),
                        //         Infolists\Components\TextEntry::make('updated_at'),
                        //         Infolists\Components\TextEntry::make('status_hadir'),

                        //     ]),
                        Infolists\Components\TextEntry::make('jumlahabsen')
                        ->label('Jumlah Tidak Hadir di Kelas :')
                        ->suffix(' kali absensi jam pelajaran')
                        ->default(function ($record) {
                            // Hitung jumlah ketidak hadiran dari model Absensi
                            $jumlahAbsen = Absensi::where('santri_id', $record->id)
                                ->where('status_hadir', 0)
                                ->count();
                            
                            return $jumlahAbsen;
                        }),
                        // Infolists\Components\TextEntry::make('jumlahabsenasrama')
                        // ->label('Jumlah Tidak hadir di Asrama :')
                        // ->suffix(' kali absensi Asrama')
                        // ->default(function ($record) {
                        //     // Hitung jumlah ketidak hadiran dari model Absensi
                        //     $jumlahAbsen = AbsensiAsramaSantri::where('santri_id', $record->id)
                        //         ->where('status_hadir', 0)
                        //         ->count();
                            
                        //     return $jumlahAbsen;
                        // }),
                        Infolists\Components\TextEntry::make('jumlahpelanggaran')
                        ->label('kedisiplinan :')
                        ->suffix(' kali melanggar')
                        ->default(function ($record) {
                            // Hitung jumlah ketidak hadiran dari model Absensi
                            $jumlahAbsen = Pelanggaran::where('santri_id', $record->id)
                                // ->where('status_hadir', 0)
                                ->count();
                            
                            return $jumlahAbsen;
                        }),
                    ]),

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
            'index' => Pages\ListSantriReports::route('/'),
            // 'create' => Pages\CreateSantriReport::route('/create'),
            // 'edit' => Pages\EditSantriReport::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }
}
