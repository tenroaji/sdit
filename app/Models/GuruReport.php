<?php

namespace App\Models;

use App\Models\Kota;
use App\Models\Kelas;
use App\Models\Strata;
use App\Models\Absensi;
use App\Models\Tingkat;
use App\Models\Pembayaran;
use App\Models\WaliSantri;
use App\Models\ModulTahfiz;
use App\Models\NilaiSantri;
use App\Models\Pelanggaran;
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
    public function tingkat(){
        return $this->belongsTo(Tingkat::class,'tingkat_id');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function strata(){
        return $this->belongsTo(Strata::class,'strata_id');
    }
    public function orangtua(){
        return $this->hasMany(OrangtuaSantri::class,'santri_id');
    }
    public function wali(){
        return $this->hasMany(WaliSantri::class,'santri_id');
    }
    public function riwayatsekolah(){
        return $this->hasMany(RiwayatSekolahSantri::class,'santri_id');
    }
    public function riwayatprestasi(){
        return $this->hasMany(RiwayatPrestasiSantri::class,'santri_id');
    }
    public function riwayatkesehatan(){
        return $this->hasMany(RiwayatKesehatanSantri::class,'santri_id');
    }

    public function absensi(){
        return $this->hasMany(Absensi::class,'santri_id');
    }
    public function absenasrama(){
        return $this->hasMany(AbsensiAsramaSantri::class,'santri_id');
    }
    public function jadwalpulang(){
        return $this->hasMany(JadwalPulangSantri::class,'santri_id');
    }
    public function kelulusan(){
        return $this->hasMany(KelulusanSantri::class,'santri_id');
    }
    public function kenaikankelas(){
        return $this->hasMany(KenaikanTingkatSantri::class,'santri_id');
    }
    public function kegiatan(){
        return $this->hasMany(KegiatanSantri::class,'santri_id');
    }
    public function tahfiz(){
        return $this->hasMany(ModulTahfiz::class,'santri_id');
    }
    public function nilai(){
        return $this->hasMany(NilaiSantri::class,'santri_id');
    }
    public function pembayaran(){
        return $this->hasMany(Pembayaran::class,'santri_id');
    }
    public function pelanggaransantri(){
        return $this->hasMany(Pelanggaran::class,'santri_id');
    }

}
