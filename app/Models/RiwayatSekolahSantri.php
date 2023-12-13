<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSekolahSantri extends Model
{
    use HasFactory;
    protected $fillable = [
        'santri_id','asal_sekolah','lulus_tahun','strata_id','dokumen1','dokumen2','dokumen3','catatan','user_id'
    ];
    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function strata(){
        return $this->belongsTo(Strata::class,'strata_id');
    }
}
