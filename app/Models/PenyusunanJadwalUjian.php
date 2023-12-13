<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tingkat;
use App\Models\JenisUjian;
use App\Models\JadwalUjian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenyusunanJadwalUjian extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun', 'semester', 'tingkat_id', 'ujian_id','user_id'
    ];
    public function jadwalujians(){
        return $this->hasMany(JadwalUjian::class,'penyusunanjadwal_id');
    }
    public function tingkat(){
        return $this->belongsTo(Tingkat::class,'tingkat_id');
    }
    public function ujian(){
        return $this->belongsTo(JenisUjian::class,'ujian_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
