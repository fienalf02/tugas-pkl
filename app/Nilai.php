<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'id_jadwal', 'semester', 'tahun_ajaran', 'rapot'
    ];
}
