<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodePendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun','strata_id','biaya','deskripsi','mulai','sampai'
    ];
    public function strata(){
        return $this->belongsTo(Strata::class,'strata_id');
    }

    public function calons(){
        return $this->hasMany(PendaftaranSantri::class,'periodependaftaran_id');
    }
}
