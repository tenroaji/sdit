<?php

namespace App\Models;

use App\Models\User;
use App\Models\KamarAsrama;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengaturanAsrama extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun','semester','kamarasrama_id','user_id'
    ];
    public function kamar(){
        return $this->belongsTo(KamarAsrama::class,'kamarasrama_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function santris(){
        return $this->hasMany(AsramaSantri::class,'pengaturanasrama_id');
    }
}
