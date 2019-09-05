<?php

namespace App\Exports;

use App\Nilai;
use Maatwebsite\Excel\Concerns\FromCollection;

class NilaiExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Nilai::select('siswas.nama', 'mapels.mapel', 'nilais.semester', 'detail_nilais.uts', 'detail_nilais.uas', 'detail_nilais.tugas', 'nilais.rapot')
        ->join('detail_nilais', 'nilais.id', '=', 'detail_nilais.id_nilai')
        ->join('jadwals', 'jadwals.id', '=', 'nilais.id_jadwal')
        ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
        ->join('siswas', 'siswas.id', '=', 'nilais.id_siswa')
        ->get();
    }
}
