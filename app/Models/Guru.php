<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'alamat',
        'kota_id',
        'gender',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'no_telpon',
        'foto',
        'slug',
    ];

    public function kota(){
        return $this->belongsTo(Kota::class,'kota_id');
    }

    public function matapelajarans() {
        return $this->hasMany(GuruMataPelajaran::class,'guru_id');
    }
}
