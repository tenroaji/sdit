<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'santri_id',
        'nama',
        'media',
        'deskripsi',
        'user_id',
        'tanggal',
        'verification',
        'poin',
    ];


    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getLatestGaleri($limit = 12)
    {
        return $this->where('verification',true)->orderBy('created_at', 'desc')->paginate($limit);
    }

}
