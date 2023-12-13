<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Tingkat;
use App\Models\PembagianKelas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KelasSantri extends Model
{
    use HasFactory;
    protected $fillable = [
        'pembagiankelas_id',
       'santri_id',
       'user_id',
    ];

    public function santri(){
        return $this->belongsTo(Santri::class,'santri_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function pembagiankelas(){
        return $this->belongsTo(PembagianKelas::class,'pembagiankelas_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($kelasSantri) {
            // Ambil 'kelas_id' pada PembagianKelas sesuai 'pembagiankelas_id'
            $pembagianKelas = PembagianKelas::find($kelasSantri->pembagiankelas_id);

            if ($pembagianKelas) {
                // Cari model Santri sesuai dengan 'santri_id'
                $santri = Santri::find($kelasSantri->santri_id);

                if ($santri) {
                    // Update 'kelas_id' pada model Santri
                    $santri->update(['kelas_id' => $pembagianKelas->kelas_id]);
                }
            }
        });
    }
}
