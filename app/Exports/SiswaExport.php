<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiswaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $data;

    public function __construct($data=array())
    {
        $this->data = $data;
    }

    public function collection()
    {
        $id = $this->data['id'];
        $siswa = Siswa::select('siswas.NIS', 'siswas.nama', 'siswas.JK', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
        ->join('users', 'users.id', '=', 'siswas.id_user')
        ->when($id, function ($siswa, $id) {
                return $siswa->where('siswa_kelas.id_kelas',$id);
            })
        ->orderBy('nama')->get();
        return $siswa;
    }
}
