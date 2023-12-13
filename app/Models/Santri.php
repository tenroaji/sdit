<?php

namespace App\Models;

use App\Models\Kota;
use App\Models\Kelas;
use App\Models\Strata;
use App\Models\Tingkat;
use App\Models\WaliSantri;
use App\Models\OrangtuaSantri;
use App\Models\RiwayatSekolahSantri;
use App\Models\RiwayatPrestasiSantri;
use App\Models\RiwayatKesehatanSantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Santri extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'nama',
        'alamat',
        'kota_id',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'no_telpon',
        'foto',
        'kelas_id',
        'tingkat_id',
        'strata_id',
        'slug',
        'tahun'
    ];

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

}
