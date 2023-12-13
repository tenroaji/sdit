<?php

namespace App\Filament\Resources\PenentuanKenaikanResource\Pages;

use Filament\Actions;
use App\Models\Santri;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PenentuanKenaikanResource;
use App\Models\KenaikanTingkatSantri;

class CreatePenentuanKenaikan extends CreateRecord
{
    protected static string $resource = PenentuanKenaikanResource::class;
   
protected function afterCreate(): void
{
  
//   $bulan = $this->record->bulan;
  $tahun = $this->record->tahun;
  $tingkat = $this->record->tingkat_id;
  $id = $this->record->id;

  $activeSantris = Santri::where('status_aktif', 1)
    ->where('tingkat_id', $tingkat)
    ->get();
  foreach ($activeSantris as $santri) {
    $data = new KenaikanTingkatSantri();
    $data->penentuankenaikan_id = $id;
    $data->tahun = $tahun;
    $data->santri_id = $santri->id;
    $data->tingkat_lama = $tingkat;
    $data->tingkat_baru = $tingkat;
    // $data->periodepembayaran_id = $periode;
    $data->save();
}
}
}
