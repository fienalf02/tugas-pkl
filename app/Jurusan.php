<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Jurusan extends Model
{
    protected $table = "jurusans";
    protected $fillable = [
        'jurusan'
    ];

    public function kelas()
    {
        return $this->hasOne('App\Kelas');
    }
}
