<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HubungiKami extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama','no_telpon','pesan','is_active','user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
}
