<?php

namespace App\Models;

use App\Models\User;
use App\Models\KegiatanSantri;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenyusunanKegiatan extends Model
{
    use HasFactory;
    protected $fillable = ['tanggal_mulai','tanggal_selesai','nama_kegiatan','deskripsi','user_id','jeniskegiatan_id'];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function jeniskegiatan(){
        return $this->belongsTo(JenisKegiatan::class,'jeniskegiatan_id');
    }
    public function santris(){
        return $this->hasMany(KegiatanSantri::class,'kegiatan_id');
    }
}
