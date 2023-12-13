<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Fasilitas extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nomor',
        'nama',
        'kategori_id',
        'kondisi_id',
        'tanggal_pengadaan',
        'deskripsi',
        'foto',
        'slug',
    ];
}
