<?php

namespace App\Filament\Resources\PeriodePembayaranResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class PembayaransRelationManager extends RelationManager
{
    protected static string $relationship = 'pembayarans';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('bulan'),
                Forms\Components\TextInput::make('tahun'),
                Forms\Components\TextInput::make('nomor_pembayaran')
                ->default(fn () => 'Payment-' .  \Illuminate\Support\Str::uuid()->toString()),
                Forms\Components\DatePicker::make('tanggal_bayar')
                    ->default(now())
                    ->required(),
                Forms\Components\Toggle::make('status_bayar'),

                Forms\Components\Select::make('santri_id')
                   ->relationship('santri','nama'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('periodepembayaran_id')
            ->columns([
                Tables\Columns\ToggleColumn::make('status_bayar')
                ->label('Status Bayar'),    
            // Tables\Columns\TextColumn::make('updated_at')
            //     ->label('Tanggal Bayar')
            //     ->dateTime()
            //     ->sortable(),
            Tables\Columns\TextColumn::make('santri.nis')
            ->label('NIS')
            ->sortable(),
            Tables\Columns\TextColumn::make('santri.nama')
                ->numeric()
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('santri.tingkat_id')
                ->label('Kelas')
                ->sortable()->searchable(),
           Tables\Columns\TextColumn::make('santri.strata_id')
                ->label('Strata')
                ->sortable()->searchable(),    
            Tables\Columns\TextColumn::make('nilai_bayar')
                ->label('Pembayaran')->money('idr'),
            Tables\Columns\SelectColumn::make('metode_bayar')
            ->searchable()
            ->options([
                'Tunai' => 'Tunai',
                'Transfer' => 'Transfer',
            ]),
            // Tables\Columns\TextColumn::make('user_id')
            //     ->numeric()
            //     ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
               // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
               // Tables\Actions\EditAction::make(),
              //  Tables\Actions\DeleteAction::make(),
              Tables\Actions\Action::make('pdf')
              ->label('Cetak Kuitansi')
              ->color('success')
              ->action(function (Model $record) {
                  
                      return response()->streamDownload(function () use ($record) {
                          echo Pdf::loadHtml(
                              Blade::render('coba', ['record' => $record])
                          )->stream();
                      }, $record->number . 'test.pdf');
                  
                  // Load view dan buat PDF
                  // $pdf = app('dompdf.wrapper');
                  // $pdf->loadHTML(view('daftarpembayaran', ['record' => $record])->render());

                  // // Download PDF
                  // return $pdf->download('daftarpembayaran_' . $record->id . '.pdf');
              }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                  //  Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
               //Tables\Actions\CreateAction::make(),
            ]);
    }
}
