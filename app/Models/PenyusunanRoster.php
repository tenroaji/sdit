<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Strata;
use App\Models\Tingkat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenyusunanRoster extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun','semester','kelas_id','user_id'
    ];
    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function rosters(){
        return $this->hasMany(RosterMataPelajaran::class,'penyusunanroster_id');
    }
}
