<?php

namespace App\Models;

use App\Models\User;
use App\Models\Asrama;
use App\Models\JadwalPulangSantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JadwalPulang extends Model
{
    use HasFactory;
    protected $fillable = [
        'jenis_libur', 'tanggal_pulang','user_id','asrama_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function santris(){
        return $this->hasMany(JadwalPulangSantri::class,'jadwalpulang_id');
    }

    public function asrama()
    { 
        return $this->belongsTo(Asrama::class,'asrama_id');
    }
}
