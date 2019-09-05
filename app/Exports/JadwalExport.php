<?php

namespace App\Exports;

use App\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;

class JadwalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Jadwal::select('jadwals.hari', 'mapels.mapel', 'jadwals.jam', 'gurus.nama_guru', 'jadwals.ruangan', 'jadwals.tahun_ajaran')
        ->join('gurus', 'gurus.id', '=', 'jadwals.id_guru')
        ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
        ->get();
    }
}
