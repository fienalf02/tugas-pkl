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
        return Jadwal::select('gurus.nama', 'mapels.mapel', 'jadwals.hari', 'jadwals.jam', 'jadwals.ruangan')
        ->join('gurus', 'gurus.id', '=', 'jadwals.id_guru')
        ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
        ->get();
    }
}
