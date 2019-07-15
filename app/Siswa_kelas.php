<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa_kelas extends Model
{
    protected $fillable = [
        'id_siswa', 'id_kelas'
    ];
}
