<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulTahfiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'santri_id','tanggal_setor','surah_id','jus','ayat_start','ayat_end','hasil_tes','guru_id','user_id'
    ];

    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    
    public function surah(){
        return $this->belongsTo(DaftarSurah::class,'surah_id');
    }
    
    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }
    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
