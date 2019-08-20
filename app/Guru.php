<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guru;
use App\Jadwal;
use App\Siswa_kelas;

class Guru extends Model
{
    protected $table = "gurus";
    protected $fillable = [
        'NIP', 'nama', 'JK', 'password'
    ];

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }

    public function siswa_kelas()
    {
        return $this->hasOne('App\Siswa_kelas');
    }

}
