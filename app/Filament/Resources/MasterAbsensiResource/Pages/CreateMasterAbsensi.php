<?php

namespace App\Filament\Resources\MasterAbsensiResource\Pages;

use Filament\Actions;
use App\Models\Santri;
use App\Models\Absensi;
use App\Models\KelasSantri;
use App\Models\PembagianKelas;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\MasterAbsensiResource;

class CreateMasterAbsensi extends CreateRecord
{
    protected static string $resource = MasterAbsensiResource::class;

    protected function afterCreate(): void
{
  
  $tanggal = $this->record->tanggal;
  $jam = $this->record->jam_id;
  $absensis = $this->record->id;
  $matapelajaran = $this->record->matapelajaran_id;
  $guru = $this->record->guru_id;
  $kelas = $this->record->kelas_id;
  $user = $this->record->user_id;
  $tahun = $this->record->tahun;

// Fetch all active santri based on the given conditions
$santris = Santri::where('kelas_id', $kelas)
    ->where('tahun', $tahun)
    // ->where('status_aktif', 0)
    ->get();
// dd($santris);
// Iterate through each santri and create Absensi records
foreach ($santris as $santri) {
    $absensi = new Absensi();

    // Populate Absensi fields
    $absensi->santri_id = $santri->id;
    $absensi->masterabsensi_id = $absensis;
    $absensi->user_id = $user;

    // Save the Absensi record to the database
    $absensi->save();
   
   }
}
    


}
