<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jadwal;

class Mapel extends Model
{
    protected $table = "mapels";
    protected $fillable = [
        'mapel', 'KKM'
    ];

    public function jadwal()
    {
        return $this->hasOne('App\Jadwal');
    }
}
