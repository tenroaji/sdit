<?php

namespace App\Models;

use App\Models\Kota;
use App\Models\JabatanPegawai;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Model
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

    public function jabatan(){
        return $this->hasMany(JabatanPegawai::class,'pegawai_id');
    }
}
