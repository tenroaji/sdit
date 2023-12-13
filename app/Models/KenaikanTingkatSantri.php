<?php

namespace App\Models;

use App\Models\Santri;
use App\Models\Tingkat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KenaikanTingkatSantri extends Model
{
    use HasFactory;
    protected $fillable = [
        'penentuankenaikan_id',
        'tahun',
        'santri_id',
        'tingkat_lama',
        'tingkat_baru',
        'deskripsi',
        'user_id',
    ];

    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }

    public function tingkatlama(){
        return $this->belongsTo(Tingkat::class,'tingkat_lama');
    }
    public function tingkatbaru(){
        return $this->belongsTo(Tingkat::class,'tingkat_baru');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
