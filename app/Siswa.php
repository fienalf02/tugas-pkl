<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Siswa_Kelas;
use App\User;

class Siswa extends Model
{
    protected $fillable = [
        'NIS', 'nama', 'JK'
    ];

    public function siswa_kelas()
    {
        return $this->hasOne('App\Siswa_kelas');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
