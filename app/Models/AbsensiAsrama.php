<?php

namespace App\Models;

use App\Models\User;
use App\Models\AsramaSantri;
use App\Models\AbsensiAsramaSantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AbsensiAsrama extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal','asrama_id','user_id','kamarasrama_id','tahun'
    ];

    public function asrama(){
        return $this->belongsTo(Asrama::class,'asrama_id');
    }

    public function kamarasrama(){
        return $this->belongsTo(KamarAsrama::class,'kamarasrama_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function kehadiran(){
        return $this->hasMany(AbsensiAsramaSantri::class,'absensiasrama_id');
    }
}
