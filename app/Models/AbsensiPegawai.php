<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiPegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'tanggal',
        'id_pegawai',
        'status_Kehadiran',
        'alasan_absen',
        'jenis_absen',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function pegawai(){
        return $this->belongsTo(Pegawai::class,'id_pegawai');
    }
}
