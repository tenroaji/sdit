<?php

namespace App\Filament\Resources;

use Carbon\Carbon;
use Filament\Forms;
use Pages\ViewUser;
use Filament\Tables;
use App\Models\Absensi;
use Filament\Infolists;
use Filament\Forms\Form;
use App\Models\GuruReport;
use Filament\Tables\Table;
use App\Models\Pelanggaran;
use App\Models\AbsensiAsrama;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Models\AbsensiAsramaSantri;
use Infolists\Components\TextEntry;
use Illuminate\Support\Facades\Auth;
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
use App\Filament\Resources\GuruReportResource\Pages;
use App\Filament\Resources\GuruReportResource\RelationManagers;

class GuruReportResource extends Resource
{
    protected static ?string $model = GuruReport::class;
    protected static ?string $pluralModelLabel = 'Ihwal Guru';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = 'Ihwal Guru';
    protected static ?string $navigationLabel = 'Ihwal Guru';
    protected static ?int $navigationSort = 2;

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

            ->modifyQueryUsing(function (Builder $query) {
                $user = Auth::user();
                if ($user->hasRole('Guru')) {
                    $query->where("email",Auth::user()->email);
                }
            })
            ->columns([
                // Tables\Columns\TextColumn::make('nis')
                //     ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tingkat_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelas_id')
                    ->searchable()
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('strata_id')
                    ->searchable()
                    ->numeric()
                    ->sortable(),
                // Tables\Columns\IconColumn::make('status_aktif')
                //     ->boolean(),

                Tables\Columns\TextColumn::make('mata_pelajaran')
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
                ->label('Lihat Ihwal Guru'),
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

                Section::make('Ihwal Kehadiran Guru')
                ->collapsible()
                ->collapsed()
                ->schema([
                RepeatableEntry::make('absensi')
                    ->schema([
                        // Infolists\Components\TextEntry::make('id')
                        // ->date()
                        // ->label('Tanggal Mulai'),
                        Infolists\Components\TextEntry::make('tanggal')
                        ->date(),
                        Infolists\Components\TextEntry::make('mulai_jam')
                        ->time(),
                        Infolists\Components\TextEntry::make('hingga_jam')
                        ->time(),
                        Infolists\Components\TextEntry::make('matapelajaran.nama'),
                        Infolists\Components\TextEntry::make('kelas.nama'),
                        Infolists\Components\TextEntry::make('Jumlah Jam')

                        ->default(function ($record) {
                            $mulai_jam = Carbon::parse($record->mulai_jam);
                            $hingga_jam = Carbon::parse($record->hingga_jam);

                            // Calculate the difference in hours
                            $diff_hours = $hingga_jam->diffInHours($mulai_jam);
                            $diff_minutes = $hingga_jam->diffInMinutes($mulai_jam) % 60;

                            return sprintf('%d Jam %02d Menit', $diff_hours, $diff_minutes);
                        })
                    ])->columns(6)->columnSpanFull(),
                    Infolists\Components\TextEntry::make('Total Jam Absensi')
            ->default(function ($record) {
                $total_hours = 0;
                $total_minutes = 0;

                foreach ($record->absensi as $entry) {
                    $start_time = Carbon::parse($entry['mulai_jam']);
                    $end_time = Carbon::parse($entry['hingga_jam']);

                    $diff_hours = $end_time->diffInHours($start_time);
                    $diff_minutes = $end_time->diffInMinutes($start_time) % 60;

                    $total_hours += $diff_hours;
                    $total_minutes += $diff_minutes;
                }

                $total_hours += floor($total_minutes / 60);
                $total_minutes = $total_minutes % 60;
                $total_mp =  ($total_hours*2) +($total_minutes/30) ;


                return sprintf('%d Jam %02d Menit -> %d Jam Pelajaran', $total_hours, $total_minutes,$total_mp);
            }),
                ]),


                Section::make('Perangkat Ajar')
                ->collapsible()
                ->collapsed()
                ->schema([
                    RepeatableEntry::make('perangkatAjar')
                        ->label('')
                        ->schema([
                            Infolists\Components\TextEntry::make('nama')->label('Bahan Ajar'),
                            Infolists\Components\ViewEntry::make('media')
                            ->label('Berkas')
                            ->view('tables.columns.open-file'),
                        ])->columns(2)->columnSpanFull(),
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
            'index' => Pages\ListGuruReports::route('/'),
            // 'create' => Pages\CreateSantriReport::route('/create'),
            // 'edit' => Pages\EditSantriReport::route('/{record}/edit'),
            'view' => Pages\ViewUser::route('/{record}'),
        ];
    }
}
