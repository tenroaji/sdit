<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\RawPembayaran;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\Summarizers\Sum;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RawPembayaranResource\Pages;
use App\Filament\Resources\RawPembayaranResource\RelationManagers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;


class RawPembayaranResource extends Resource
{
    protected static ?string $model = RawPembayaran::class;

    protected static ?string $navigationIcon = 'heroicon-s-banknotes';
    protected static ?string $modelLabel = 'Pembayaran';
    protected static ?string $navigationLabel = 'Daftar Tunggakan';
    protected static ?string $navigationGroup = 'Keuangan Akademik';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
            Tables\Columns\ToggleColumn::make('status_bayar')
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
            ->headerActions([
                Tables\Actions\Action::make('print')
                    ->label('Cetak Pdf')

                    ->action(function () {
                        // Query menggunakan Eloquent Query Builder
                        $records = RawPembayaran::unpaid()->get();

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
            'index' => Pages\ListRawPembayarans::route('/'),
          //  'create' => Pages\CreateRawPembayaran::route('/create'),
           // 'edit' => Pages\EditRawPembayaran::route('/{record}/edit'),
        ];
    }    
}
