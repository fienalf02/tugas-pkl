<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Guru;
use App\Mapel;
use App\Nilai;

class Jadwal extends Model
{
    protected $fillable = [
        'hari','jam','ruangan','tahun_ajaran','id_guru', 'id_mapel'
    ];

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }

    public function Nilai()
    {
        return $this->hasMany('App\Nilai');
    }
}
