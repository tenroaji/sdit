<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranBiayaPendaftaran extends Model
{
    use HasFactory;
    protected $table = 'pendaftaran_santris';

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
     /**
     * Scope untuk mengambil data dengan status_bayar = 0.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnpaid($query)
    {
        return $query->where('status_bayar_biaya', 1);
    }

}
