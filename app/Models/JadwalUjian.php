<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tingkat;
use App\Models\MataPelajaran;
use App\Models\PenyusunanJadwalUjian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalUjian extends Model
{
    use HasFactory;
    protected $fillable = [
        'penyusunanjadwal_id','matapelajaran_id','tanggal','jam_id','user_id'

    ];

    public function penyusunanjadwal(){
        return $this->belongsTo(PenyusunanJadwalUjian::class,'penyusunanjadwal_id');
    }
    public function matapelajaran(){
        return $this->belongsTo(MataPelajaran::class,'matapelajaran_id');
    }
    public function jam(){
        return $this->belongsTo(JamSekolah::class,'jam_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
