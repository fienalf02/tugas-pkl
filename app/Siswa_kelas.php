<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Siswa_kelas;
use App\Siswa;
use App\Kelas;
use App\Guru;
use App\Nilai;
use App\Pembayaran;

class Siswa_kelas extends Model
{
    protected $table = "siswa_kelas";
    protected $fillable = [
        'id_siswa', 'id_kelas', 'id_guru'
    ];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }

    public function nilai()
    {
        return $this->hasMany('App\Kelas');
    }

    public function pembayaran()
    {
        return $this->hasMany('App\Kelas');
    }
}
