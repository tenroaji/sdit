<?php

namespace App\Models;

use App\Models\User;
use App\Models\Santri;
use App\Models\PengaturanAsrama;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AsramaSantri extends Model
{
    use HasFactory;
    protected $fillable = [
        'pengaturanasrama_id','santri_id','user_id'
    ];

    public function pengaturanasrama(){
        return $this->belongsTo(PengaturanAsrama::class,'pengaturanasrama_id');
    }
    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
