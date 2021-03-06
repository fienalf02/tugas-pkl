<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jadwal;
use App\Siswa_kelas;
use App\Detail_nilai;

class Nilai extends Model
{
    protected $fillable = [
        'id_siswakelas', 'id_jadwal', 'semester', 'tahun_ajaran', 'rapot'
    ];

    public function jadwal()
    {
        return $this->belongsTo('App\Jadwal');
    }

    public function siswa_kelas()
    {
        return $this->belongsTo('App\Siswa_kelas');
    }

    public function detail_nilai()
    {
        return $this->hasOne('App\Detail_nilai');
    }
}
