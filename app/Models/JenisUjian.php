<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisUjian extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama','deskripsi','user_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
