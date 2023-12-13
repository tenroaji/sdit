<?php

namespace App\Models;

use App\Models\User;
use App\Models\Tingkat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembagianKelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun','tingkat_id','kelas_id','deskripsi','user_id'
    ];
    public function tingkat(){
        return $this->belongsTo(Tingkat::class,'tingkat_id');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }
    public function santris(){
        return $this->hasMany(KelasSantri::class,'pembagiankelas_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
