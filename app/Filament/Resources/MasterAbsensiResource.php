<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasterAbsensiResource\Pages;
use App\Filament\Resources\MasterAbsensiResource\RelationManagers;
use App\Filament\Resources\MasterAbsensiResource\RelationManagers\AbsensisRelationManager;
use App\Models\MasterAbsensi;
use Filament\Forms;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MasterAbsensiResource extends Resource
{
    protected static ?string $model = MasterAbsensi::class;
    protected static ?string $navigationIcon = 'heroicon-s-document-text';
    protected static ?string $modelLabel = 'Pengisian Absensi';
    protected static ?string $navigationLabel = 'Pengisian Absensi';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('tahun')
                ->maxLength('9')
                    ->required(),
                Forms\Components\DatePicker::make('tanggal')
                ->default(now())
                    ->required(),
                Forms\Components\Select::make('matapelajaran_id')
                    ->relationship('matapelajaran', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),
                    Forms\Components\TextInput::make('tema'),
                    Forms\Components\TextInput::make('subtema'),
                // Forms\Components\Select::make('jam_id')
                //     ->relationship('jam', 'nama')
                //     ->searchable()
                //     ->preload()
                //     ->required(),
                TimePicker::make('mulai_jam')
                ->seconds(false)
                ->datalist([
                    '07:50',
                    '08:20',
                    '08:50',
                    '09:20',
                    '09:50',
                    '10:20',
                    '10:40',
                    '11:40',
                    '12:10',
                    '13:05',
                    '13:35',
                    '14:05',
                    '14:35',
                    '15:05',
                    '15:35',
                ]),
                TimePicker::make('hingga_jam')
                ->seconds(false)
                ->datalist([
                    '08:20',
                    '08:50',
                    '09:20',
                    '09:50',
                    '10:20',
                    '10:40',
                    '11:40',
                    '12:10',
                    '13:05',
                    '13:35',
                    '14:05',
                    '14:35',
                    '15:05',
                    '15:35',
                    '16:05',
                ]),
                Forms\Components\Select::make('guru_id')
                    ->relationship('guru', 'nama')
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('kelas_id')
                    ->relationship('kelas', 'nama')
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->default(Auth()->id())
                    ->disableOptionWhen(fn (string $value): bool => true)
                    // ->disabled()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->heading(function (Builder $query) {

        })
            ->modifyQueryUsing(function (Builder $query) {
                $user = Auth::user();
                if ($user->hasRole('Guru')) {
                    $query->where("user_id",Auth::user()->id);
                }
            })
            ->columns([
                Tables\Columns\TextColumn::make('tahun'),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()

                    ->sortable(),
                    Tables\Columns\TextColumn::make('tema')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('subtema')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('jam.nama')
                //     ->label('Jam Pelajaran'),
                    Tables\Columns\TextColumn::make('mulai_jam')
                    ->time()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('hingga_jam')
                    ->time()
                    ->sortable(),
                Tables\Columns\TextColumn::make('matapelajaran.nama')

                    ->sortable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('kelas.nama')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total')
                ->default(function ($record) {
                    $total_hours = 0;
                    $total_minutes = 0;

                    // foreach ($record->absensi as $entry) {
                        $start_time = Carbon::parse($record->mulai_jam);
                        $end_time = Carbon::parse($record->hingga_jam);

                        $diff_hours = $end_time->diffInHours($start_time);
                        $diff_minutes = $end_time->diffInMinutes($start_time) % 60;

                        $total_hours += $diff_hours;
                        $total_minutes += $diff_minutes;
                    // }

                    $total_hours += floor($total_minutes / 60);
                    $total_minutes = $total_minutes % 60;
                    $total_mp =  ($total_hours*2) +($total_minutes/30) ;


                    return sprintf('%d Jam %02d Menit -> %d Jam Pelajaran', $total_hours, $total_minutes,$total_mp);
                }),
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
            AbsensisRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMasterAbsensis::route('/'),
            'create' => Pages\CreateMasterAbsensi::route('/create'),
            'edit' => Pages\EditMasterAbsensi::route('/{record}/edit'),
        ];
    }
}
