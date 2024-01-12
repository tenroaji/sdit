<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianKinerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_kompetensi_guru_id',
        'guru_id',
        'periode_awal',
        'periode_akhir',
        'nilai',
        'proporsi',
        'nilai_akhir',
        'penilai',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function guru(){
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function refKompetensiGuru(){
        return $this->belongsTo(RefKompetensiGuru::class, 'ref_kompetensi_guru_id');
    }


}
