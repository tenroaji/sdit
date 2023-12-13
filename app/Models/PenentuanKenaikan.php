<?php

namespace App\Models;

use App\Models\Tingkat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenentuanKenaikan extends Model
{
    use HasFactory;
    protected $fillable = ['tahun','tingkat_id'];

    public function tingkat(){
        return $this->belongsTo(Tingkat::class,'tingkat_id');
    }
    public function kenaikantingkats(){
        return $this->hasMany(KenaikanTingkatSantri::class,'penentuankenaikan_id');
    }
}
