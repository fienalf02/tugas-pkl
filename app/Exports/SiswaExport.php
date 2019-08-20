<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::select('siswas.NIS', 'siswas.nama', 'siswas.JK', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
        ->get();
    }
}
