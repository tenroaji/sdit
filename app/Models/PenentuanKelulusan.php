<?php

namespace App\Models;

use App\Models\User;
use App\Models\Strata;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenentuanKelulusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun','strata_id','deskripsi','user_id'
    ];

    public function strata(){
        return $this->belongsTo(Strata::class,'strata_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function santris(){
        return $this->hasMany(KelulusanSantri::class,'kelulusan_id');
    }

}
