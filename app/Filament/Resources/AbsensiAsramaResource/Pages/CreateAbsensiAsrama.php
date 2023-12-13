<?php

namespace App\Filament\Resources\AbsensiAsramaResource\Pages;

use App\Filament\Resources\AbsensiAsramaResource;
use App\Models\AbsensiAsrama;
use App\Models\AbsensiAsramaSantri;
use App\Models\AsramaSantri;
use App\Models\PengaturanAsrama;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAbsensiAsrama extends CreateRecord
{
    protected static string $resource = AbsensiAsramaResource::class;

    protected function afterCreate(): void
{
  
  $asrama = $this->record->asrama_id;
  $kamar = $this->record->kamarasrama_id;
  $absensis = $this->record->id;
  $tanggal = $this->record->tanggal;
  $user = $this->record->user_id;
  $tahun = $this->record->tahun;
  
  $activeAsrama = PengaturanAsrama::where('tahun', $tahun)
    ->where('kamarasrama_id',$kamar)
    ->first();
    // dd($activeKelas);
    if($activeAsrama){
    $pembagianAsrama = $activeAsrama->id;
    $activeSantris = AsramaSantri::where('pengaturanasrama_id',$pembagianAsrama)->get();  
   foreach ($activeSantris as $santri) {
    $absensi = new AbsensiAsramaSantri();
    $absensi->santri_id = $santri->id;
    $absensi->absensiasrama_id = $absensis;
    $absensi->user_id = $user;
    $absensi->save();
   }
   }
}
}
