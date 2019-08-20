<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jurusan;
use App\Kelas;
use App\Siswa_Kelas;

class Kelas extends Model
{
    protected $table = "kelas";
    protected $fillable = [
        'id_jurusan', 'kelas', 'urutan'
    ];

    public function jurusan()
    {
        return $this->belongsTo('App\Jurusan', 'id');
    }

    public function siswa_kelas()
    {
        return $this->hasOne('App\Siswa_kelas');
    }
}
