<?php

namespace App\Exports;

use App\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;

class PembayaranExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pembayaran::select('siswas.nama', 'pembayarans.bulan', 'pembayarans.jatuh_tempo', 'pembayarans.tgl_bayar', 'pembayarans.jumlah', 'pembayarans.keterangan')
        ->join('siswas', 'siswas.id', '=', 'pembayarans.id_siswa')
        ->get();
    }
}
