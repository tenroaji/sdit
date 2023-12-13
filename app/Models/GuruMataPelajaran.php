<?php

namespace App\Models;

use App\Models\Guru;
use App\Models\User;
use App\Models\Tingkat;
use App\Models\MataPelajaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GuruMataPelajaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'guru_id','matapelajaran_id','tingkat_id','user_id'
    ];
    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }
    public function matapelajaran(){
        return $this->belongsTo(MataPelajaran::class,'matapelajaran_id');
    }
    public function tingkat(){
        return $this->belongsTo(Tingkat::class,'tingkat_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
