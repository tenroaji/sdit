<?php

namespace App\Filament\Resources\PeriodePembayaranResource\Pages;

use Filament\Actions;
use App\Models\Santri;
use App\Models\Pembayaran;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PeriodePembayaranResource;

class CreatePeriodePembayaran extends CreateRecord
{
    protected static string $resource = PeriodePembayaranResource::class;


protected function afterCreate(): void
{
  
  $bulan = $this->record->bulan;
  $tahun = $this->record->tahun;
  $periode = $this->record->id;
  $nilaibayar = $this->record->jumlah_bayar;
  $tingkat = $this->record->tingkat_id;
  $strata = $this->record->strata_id;

  $activeSantris = Santri::where('status_aktif', 1)
    ->where('tingkat_id', $tingkat)
    ->where('strata_id', $strata)
    ->get();
  foreach ($activeSantris as $santri) {
    $pembayaran = new Pembayaran();
    $pembayaran->bulan = $bulan;
    $pembayaran->tahun = $tahun;
    $pembayaran->nilai_bayar = $nilaibayar;
    $pembayaran->periodepembayaran_id = $periode;
    $pembayaran->santri_id = $santri->id;
    $pembayaran->save();
}
    


}
}
