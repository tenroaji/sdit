<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisJabatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama','deskripsi','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
