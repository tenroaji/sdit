<?php

namespace App\Models;

use App\Models\Strata;
use App\Models\RefTahunAjaran;
use App\Models\Tingkat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PeriodePembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'bulan','tahun','tingkat_id','strata_id','jumlah_bayar'
    ];

    public function tahun(){
        return $this->belongsTo(RefTahunAjaran::class,'tahun','nama');
    }
    public function pembayarans(){
        return $this->hasMany(Pembayaran::class,'periodepembayaran_id');
    }
    public function tingkat(){
        return $this->belongsTo(Tingkat::class,'tingkat_id');
    }
    public function strata(){
        return $this->belongsTo(Strata::class,'strata_id');
    }
}
