<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Nilai;

class Detail_nilai extends Model
{
    protected $fillable = [
        'id_nilai', 'tugas', 'uts', 'uas'
    ];

    public function nilai()
    {
        return $this->belongsTo('App\Nilai');
    }
}
