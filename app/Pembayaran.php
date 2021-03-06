<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Siswa_kelas;

class Pembayaran extends Model
{
    protected $fillable = [
        'id_siswa', 'bulan', 'jatuh_tempo', 'nomor', 'jumlah', 'keterangan'
    ];

    public function siswa_kelas()
    {
        return $this->belongsTo('App\Siswa_kelas');
    }

}
