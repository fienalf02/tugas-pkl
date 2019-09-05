<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Kelas;

class Jurusan extends Model
{
    protected $fillable = [
        'jurusan'
    ];

    public function kelas()
    {
        return $this->hasOne('App\Kelas');
    }
}
