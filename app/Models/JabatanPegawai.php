<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\JenisJabatan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JabatanPegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'pegawai_id','jabatan_id','tanggal','user_id'
    ];

    public function pegawai(){
        return $this->belongsTo(Pegawai::class,'pegawai_id');
    }
    
    public function jabatan(){
        return $this->belongsTo(JenisJabatan::class,'jabatan_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
