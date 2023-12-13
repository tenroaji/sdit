<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSantri extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'periodependaftaran_id',
        'tahun',
        'nama',
        'alamat',
        'kota_id',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'no_telpon',
        'foto',
        'strata_id',
        'status_bayar_biaya',
        'status_terima',
        'asal_sekolah',
        'ijasah',
        'kartu_keluarga'
    ];
    public function kota(){
        return $this->belongsTo(Kota::class,'kota_id');
    }
  
    public function strata(){
        return $this->belongsTo(Strata::class,'strata_id');
    }

    public function periode(){
        return $this->belongsTo(PeriodePendaftaran::class,'periodependaftaran_id');
    }
}
