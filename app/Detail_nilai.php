<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_nilai extends Model
{
    protected $fillable = [
        'id_nilai', 'tugas', 'uts', 'uas'
    ];
}
