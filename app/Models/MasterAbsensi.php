<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Absensi;
use App\Models\JamSekolah;
use App\Models\MataPelajaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterAbsensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun','matapelajaran_id','tanggal','guru_id','kelas_id','user_id','jam_id'
    ];
    public function matapelajaran(){
        return $this->belongsTo(MataPelajaran::class,'matapelajaran_id');
    }
    public function absensis(){
    return $this->hasMany(Absensi::class,'masterabsensi_id');
    }
    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }
    public function jam(){
        return $this->belongsTo(JamSekolah::class,'jam_id');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
