<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Santri;

class SantriGaleri extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'nama',
        'media',
        'deskripsi',
        'tingkat_id',
        'user_id',
        'tanggal',
    ];


    public function kelas(){
        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
