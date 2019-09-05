<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jadwal;
use App\Siswa_kelas;
use App\User;

class Guru extends Model
{
    protected $fillable = [
        'NIP', 'nama', 'JK', 'password'
    ];

    public function jadwal()
    {
        return $this->hasMany('App\Jadwal');
    }

    public function siswa_kelas()
    {
        return $this->hasMany('App\Siswa_kelas');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
