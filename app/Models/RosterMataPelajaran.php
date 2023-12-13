<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\JamSekolah;
use App\Models\HariSekolah;
use App\Models\MataPelajaran;
use App\Models\PenyusunanRoster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RosterMataPelajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'penyusunanroster_id','hari_id','jam_id','matapelajaran_id', 'guru_id','kelas_id','user_id'
    ];

    public function penyusunanroster(){
        return $this->belongsTo(PenyusunanRoster::class,'penyusunanroster_id');
    }
    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }
    public function matapelajaran(){
        return $this->belongsTo(MataPelajaran::class,'matapelajaran_id');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function hari(){
        return $this->belongsTo(HariSekolah::class,'hari_id');
    }
    public function jam(){
        return $this->belongsTo(JamSekolah::class,'jam_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
