<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Siswa;
use App\Siswa_Kelas;

class Siswa extends Model
{
    protected $table = "siswas";
    protected $fillable = [
        'NIS', 'nama', 'JK'
    ];

    public function siswa_kelas()
    {
        return $this->hasOne('App\Siswa_kelas', 'id');
    }
}
