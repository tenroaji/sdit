<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiPegawaiVerification extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'absensi_pegawais';

    protected $fillable = [
        'status_verifikasi',
        'tanggal',
        'id_pegawai',
        'status_Kehadiran',
        'alasan_absen',
        'jenis_absen',
        'user_id',
        'verified_by',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function verifiedBy(){
        return $this->belongsTo(User::class,'verified_by');
    }

    public function pegawai(){
        return $this->belongsTo(Pegawai::class,'id_pegawai');
    }
}
