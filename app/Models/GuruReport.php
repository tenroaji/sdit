<?php

namespace App\Models;

use App\Models\Kota;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Strata;
use App\Models\Absensi;
use App\Models\Tingkat;
use App\Models\Pembayaran;
use App\Models\WaliSantri;
use App\Models\ModulTahfiz;
use App\Models\NilaiSantri;
use App\Models\Pelanggaran;
use App\Models\PerangkatAjar;
use App\Models\KegiatanSantri;
use App\Models\OrangtuaSantri;
use App\Models\KelulusanSantri;
use App\Models\JadwalPulangSantri;
use App\Models\AbsensiAsramaSantri;
use App\Models\RiwayatSekolahSantri;
use App\Models\KenaikanTingkatSantri;
use App\Models\RiwayatPrestasiSantri;
use App\Models\RiwayatKesehatanSantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuruReport extends Model
{
    use HasFactory;
    protected $table = 'gurus';

    public function kota(){
        return $this->belongsTo(Kota::class,'kota_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function absensi(){
        return $this->hasMany(MasterAbsensi::class,'guru_id');
    }
    
    public function perangkatAjar(){
        return $this->hasMany(PerangkatAjar::class,'guru_id');
    }

    // public function perangkatAjar(){
    //     return $this->hasMany(PerangkatAjar::class,'santri_id')->whereHas('jenispelanggaran', function ($query) {
    //         $query->where('jenis_pelanggarans.tipe', "Punishment"); // Ganti dengan nama jenis pelanggaran yang diinginkan
    //     });
    // }

    // /**
    //  * Get all of the comments for the GuruReport
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\HasMany
    //  */
    // public function comments(): HasMany
    // {
    //     return $this->hasMany(Comment::class, 'foreign_key', 'local_key');
    // }

}
