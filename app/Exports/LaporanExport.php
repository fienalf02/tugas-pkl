<?php

namespace App\Exports;

use App\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class LaporanExport implements FromCollection
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
        $pembayaran = Pembayaran::select('siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'pembayarans.bulan', 'pembayarans.jumlah', 'pembayarans.keterangan')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->when($id, function ($pembayaran, $id) {
                            return $pembayaran->where('pembayarans.id',$id);
                        })
                        ->orderBy('nama')->get();
        return $pembayaran;
    }
}
