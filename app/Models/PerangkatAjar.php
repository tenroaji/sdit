<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatAjar extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nama','media','guru_id','user_id'];


    public function guru(){
        return $this->belongsTo(Guru::class,'guru_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}
