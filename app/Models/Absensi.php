<?php

namespace App\Models;

use App\Models\User;
use App\Models\Santri;
use App\Models\MasterAbsensi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;
    protected $fillable = [
        'masterabsensi_id', 'santri_id', 'status_hadir', 'user_id'
    ];

    public function masterabsensi(){
        return $this->belongsTo(MasterAbsensi::class, 'masterabsensi_id');
    }

    public function santri(){
        return $this->belongsTo(Santri::class, 'santri_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
