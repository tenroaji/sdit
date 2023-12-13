<?php

namespace App\Models;

use App\Models\User;
use App\Models\Asrama;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KamarAsrama extends Model
{
    use HasFactory;
    protected $fillable = [
        'asrama_id','nama','user_id'
    ];

    public function asrama(){
        return $this->belongsTo(Asrama::class,'asrama_id');
    }

    
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
