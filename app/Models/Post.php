<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul', 'jenis', 'ringkasan','foto','isi','user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function getLatestPosts($limit = 10)
    {
        return $this->orderBy('created_at', 'desc')->limit($limit)->get();
    }
}
