<?php

namespace App\Filament\Resources\PenentuanKelulusanResource\Pages;

use Filament\Actions;
use App\Models\Santri;
use App\Models\KelulusanSantri;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\PenentuanKelulusanResource;

class CreatePenentuanKelulusan extends CreateRecord
{
    protected static string $resource = PenentuanKelulusanResource::class;

    protected function afterCreate(): void
{
  
//   $bulan = $this->record->bulan;
  $tahun = $this->record->tahun;
  $strata = $this->record->strata_id;
  $id = $this->record->id;

  $activeSantris = Santri::where('status_aktif', 1)
    ->where('strata_id', $strata)
    ->where(function ($query) {
        $query->where('tingkat_id', 9)
              ->orWhere('tingkat_id', 12);
    })
    ->get();
  foreach ($activeSantris as $santri) {
    $data = new KelulusanSantri();
    $data->kelulusan_id = $id;
    $data->tahun = $tahun;
    $data->santri_id = $santri->id;
    $data->strata_lama = $strata;
    $data->strata_baru = $strata;
    // $data->periodepembayaran_id = $periode;
    $data->save();
}
}
}
