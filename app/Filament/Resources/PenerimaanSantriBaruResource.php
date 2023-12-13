<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Santri;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\PenerimaanSantriBaru;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Enums\ActionsPosition;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PenerimaanSantriBaruResource\Pages;
use App\Filament\Resources\PenerimaanSantriBaruResource\RelationManagers;

class PenerimaanSantriBaruResource extends Resource
{
    protected static ?string $model = PenerimaanSantriBaru::class;

    protected static ?string $navigationIcon = 'heroicon-s-user-group';
    protected static ?string $modelLabel = 'Penerimaan santri Baru';
    protected static ?string $navigationLabel = 'Penerimaan Santri Baru';
    protected static ?string $navigationGroup = 'Akademik';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('periodependaftaran_id'),

                Forms\Components\TextInput::make('tahun')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('strata_id')
                    ->searchable()
                    ->preload()
                    ->relationship('strata', 'nama'),
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
                Forms\Components\FileUpload::make('foto')
                ->disk('public_images')
                ->preserveFilenames(),
                
                Forms\Components\Toggle::make('status_bayar_biaya')
                    ->required(),
                Forms\Components\Toggle::make('status_terima')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('status_bayar_biaya')
                    ->label('Telah Bayar')
                    ->boolean(),
                Tables\Columns\IconColumn::make('status_terima')
                    ->label('Diterima')
                    ->boolean(),
                // Tables\Columns\TextColumn::make('periode.tahun')
                //     ->label('Tahun')
                //     ->sortable(),
                Tables\Columns\TextColumn::make('strata.nama')
                    ->label('Jenjang')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('alamat')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kota_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tempat_lahir')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('no_telpon')
                    ->searchable(),
                Tables\Columns\TextColumn::make('foto')
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
                Tables\Actions\Action::make('bayar')
                    ->action((function ($record) {
                        $record->update(['status_bayar_biaya' => $record->status_bayar_biaya === 0 ? 1 : 0]);
                    }),)
                    ->label('Bayar'),
                Tables\Actions\Action::make('terima')
                    ->action((function ($record) {
                        $record->update(['status_terima' => $record->status_terima === 0 ? 1 : 0]);
                        if ($record->strata_id === 3){
                            $tingkat = 7;
                        } elseif ($record->strata_id === 3){
                            $tingkat = 10;
                        }
                        if ($record->status_terima === 1) {
                            
                            Santri::create([
                                'nama' => $record->nama,
                                 'nis' => 'Santri Baru-' . $record->tahun .'-'. $record->id,
                                'strata_id' => $record->strata_id,
                                'tahun' => $record->tahun,
                                'tingkat_id' => $tingkat,
                                'alamat' => $record->alamat,
                                'kota_id' => $record->kota_id,
                                'gender' => $record->gender,
                                'tempat_lahir' => $record->tempat_lahir,
                                'tanggal_lahir' => $record->tanggal_lahir,
                                'email' => $record->email,
                                'no_telpon' => $record->no_telpon,
                                'foto' => $record->foto,
                            ]);
                        } else {
                            // Hapus data dari Model Santri berdasarkan nama dan nis
                            Santri::where('nama', $record->nama)
                                ->where('nis', 'Santri Baru-' . $record->tahun .'-'. $record->id)
                                ->where('strata_id', $record->strata_id)
                                ->delete();
                        }
                    }),)
                    
                    ->label('Diterima'),

            ], position: ActionsPosition::BeforeColumns)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListPenerimaanSantriBarus::route('/'),
            // 'create' => Pages\CreatePenerimaanSantriBaru::route('/create'),
            // 'edit' => Pages\EditPenerimaanSantriBaru::route('/{record}/edit'),
        ];
    }
}
