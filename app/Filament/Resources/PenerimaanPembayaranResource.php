<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;

use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\PenerimaanPembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Summarizers\Sum;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PenerimaanPembayaranResource\Pages;
use App\Filament\Resources\PenerimaanPembayaranResource\RelationManagers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;

class PenerimaanPembayaranResource extends Resource
{
    protected static ?string $model = PenerimaanPembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-s-document-check';
    protected static ?string $modelLabel = 'Pembayaran';
    protected static ?string $navigationLabel = 'Daftar Pembayaran Bulanan';
    protected static ?string $navigationGroup = 'Keuangan Akademik';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('periodepembayaran_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('bulan')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('tanggal_bayar'),
                Forms\Components\TextInput::make('nomor_pembayaran')
                    ->maxLength(255),
                Forms\Components\TextInput::make('santri_id')
                    ->numeric(),
                Forms\Components\Toggle::make('status_bayar')
                    ->required(),
                Forms\Components\TextInput::make('metode_bayar')
                    ->maxLength(255),
                Forms\Components\TextInput::make('nilai_bayar')
                    ->numeric(),
                Forms\Components\TextInput::make('sisa_bayar')
                    ->numeric(),
                Forms\Components\TextInput::make('bank')
                    ->maxLength(255),
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
                Tables\Columns\IconColumn::make('status_bayar')
                    ->boolean()
                    ->label('Status Bayar'),
                Tables\Columns\TextColumn::make('periode.bulan')
                    ->label('Bulan'),
                Tables\Columns\TextColumn::make('periode.tahun')
                    ->label('Tahun'),
                Tables\Columns\TextColumn::make('santri.nis')
                    ->label('NIS')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('santri.nama')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('santri.tingkat.nama')
                    ->label('Kelas')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('santri.strata.nama')
                    ->label('Jenjang')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nilai_bayar')
                    ->label('Pembayaran')->money('idr')
                    ->summarize(Sum::make()->money('IDR')),
            ])
            ->filters([
                //
            ])
            ->actions([
                //  Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('pdf')
                ->label('Cetak Kuitansi')
                ->color('success')
                ->action(function (Model $record) {
                    
                        return response()->streamDownload(function () use ($record) {
                            echo Pdf::loadHtml(
                                Blade::render('coba', ['record' => $record])
                            )->stream();
                        }, $record->id . 'test.pdf');
                    
                    // Load view dan buat PDF
                    // $pdf = app('dompdf.wrapper');
                    // $pdf->loadHTML(view('daftarpembayaran', ['record' => $record])->render());

                    // // Download PDF
                    // return $pdf->download('daftarpembayaran_' . $record->id . '.pdf');
                }),
            ])
            ->headerActions([
                Tables\Actions\Action::make('print')
                    ->label('Cetak Pdf')

                    ->action(function () {
                        // Query menggunakan Eloquent Query Builder
                        $records = PenerimaanPembayaran::unpaid()->get();

                        // Menghasilkan nama file PDF yang unik
                        $filename = 'semua_pembayaran_' . now()->format('YmdHis') . '.pdf';
                
                        return response()->streamDownload(function () use ($records) {
                            // Menggunakan Blade untuk merender tampilan
                            echo Pdf::loadHtml(
                                Blade::render('coba', ['records' => $records])
                            )->stream();
                        }, $filename);
                    }),

            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                //  ]),
            ])
            ->emptyStateActions([
                //    Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListPenerimaanPembayarans::route('/'),
            // 'create' => Pages\CreatePenerimaanPembayaran::route('/create'),
            //  'edit' => Pages\EditPenerimaanPembayaran::route('/{record}/edit'),
        ];
    }
}
