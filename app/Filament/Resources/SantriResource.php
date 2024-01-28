<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Santri;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\File;
use App\Models\RiwayatPrestasiSantri;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Illuminate\Support\Facades\Blade;
use App\Models\RiwayatKesehatanSantri;
use Filament\Forms\Components\Section;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SantriResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationGroup;
use App\Filament\Resources\SantriResource\RelationManagers;
use App\Filament\Resources\SantriResource\RelationManagers\WaliRelationManager;
use App\Filament\Resources\SantriResource\RelationManagers\OrangtuaRelationManager;
use App\Filament\Resources\SantriResource\RelationManagers\RiwayatsekolahRelationManager;
use App\Filament\Resources\SantriResource\RelationManagers\RiwayatprestasiRelationManager;
use App\Filament\Resources\SantriResource\RelationManagers\RiwayatkesehatanRelationManager;

class SantriResource extends Resource
{
    protected static ?string $model = Santri::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';
    protected static ?string $modelLabel = 'Daftar Santri';
    protected static ?string $navigationLabel = 'Daftar Santri';
    protected static ?string $navigationGroup = 'Biodata';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                TextInput::make('nis')
                ->label('NISN'),
                TextInput::make('nama'),
                    // ->live()
                    // ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                    TextInput::make('tahun')
                    ->label('Tahun Ajaran'),
                    Select::make('tingkat_id')
                    ->label('Kelas')
                    ->relationship('tingkat','nama')
                    ->preload()
                    ->searchable(),
                    Select::make('strata_id')
                    ->label('Jenjang Sekolah')
                ->relationship('strata','nama')
                ->preload()
                ->searchable(),
                TextInput::make('alamat'),
                Select::make('kota_id')
                ->relationship('kota','nama')
                ->preload()
                ->searchable(),
                Select::make('gender')
                ->searchable()
                ->preload()
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan'
                    ]),
                TextInput::make('tempat_lahir'),
                DatePicker::make('tanggal_lahir')->date(),
                TextInput::make('email'),
                TextInput::make('no_telpon'),
                Toggle::make('status_aktif'),
                // ->boolean(),
                // TextInput::make('slug'),
                FileUpload::make('foto')
                ->disk('public_images')
                ->preserveFilenames() // Sesuaikan dengan nama disk yang Anda tentukan
                // ->path('your-custom-path') // Opsional, sesuaikan dengan path yang Anda inginkan,


            ])

                ;
    }

    public static function table(Table $table): Table
    {
        return $table
         ->queryStringIdentifier('users')
            ->columns([
                TextColumn::make('nis')
                ->label('NISN')
                ->searchable() ->sortable(),
                TextColumn::make('nama')
                ->searchable() ->sortable(),
                TextColumn::make('tingkat.nama')
                ->label('Kelas')
                ->searchable() ->sortable(),
                TextColumn::make('tahun')
                ->label('Tahun Ajaran')
                ->searchable() ->sortable(),
                TextColumn::make('strata.nama')
                ->searchable() ->sortable(),
                TextColumn::make('gender')
                ->searchable() ->sortable(),
                IconColumn::make('status_aktif')
                ->boolean()
            ])
            ->defaultSort('id', 'desc')
            ->filters([

               ])
            ->actions([
                Tables\Actions\EditAction::make(),
                // Tables\Actions\Action::make('pdf')
                // ->label('Cetak Kartu Santri')
                // ->color('success')
                // ->action(function (Model $record) {
                //     $hasilcetak = $record->nis .'-'. $record->nama . '.pdf';
                //     return response()->streamDownload(function () use ($record) {
                //         echo Pdf::loadHtml(
                //             Blade::render('kartusantri', ['record' => $record])
                //         )->stream();
                //     }, $hasilcetak);
                //  }),






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
            RelationGroup::make('Contacts', [
                OrangtuaRelationManager::class,
                WaliRelationManager::class,
                RiwayatsekolahRelationManager::class,
                RiwayatprestasiRelationManager::class,
                RiwayatkesehatanRelationManager::class,
            ]),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSantris::route('/'),
            'create' => Pages\CreateSantri::route('/create'),
            'edit' => Pages\EditSantri::route('/{record}/edit'),
        ];
    }
}
