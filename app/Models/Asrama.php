<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asrama extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'lokasi',
        'daya_muat',
        'deskripsi',
        'foto',
        'slug',
    ];
    public function kamar(){
        return $this->hasMany(KamarAsrama::class,'asrama_id');
    }
}
