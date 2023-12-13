<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\User;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterNilai extends Model
{
    use HasFactory;
    protected $fillable = [
        'kelas_id','tahun','semester','matapelajaran_id','user_id','guru_id','jenisnilai_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function jenisnilai(){
        return $this->belongsTo(JenisNilai::class,'jenisnilai_id');
    }
    
    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    
    public function matapelajaran(){
        return $this->belongsTo(MataPelajaran::class,'matapelajaran_id');
    }
    
    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }

    public function nilaisantri(){
        return $this->hasMany(NilaiSantri::class,'masternilai_id');
    }
    
}
