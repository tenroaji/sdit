<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanSantriBaru extends Model
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
        'asal_sekolah',
        'lulus_tahun',
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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Retrieve data from PeriodePendaftaran
            $periode = PeriodePendaftaran::find($model->periodependaftaran_id);

            // Set $tahun and $strataId
            $tahun = $periode->tahun ?? null;
            $strataId = $periode->strata_id ?? null;

            // Check and update fields if they are null
            $model->tahun = $model->tahun ?? $tahun;
            $model->strata_id = $model->strata_id ?? $strataId;
        });
    }

}
