<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Pembayaran;
use App\Siswa_kelas;
use App\Kelas;
use App\Siswa;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $search = $request->search;

        $pembayarann = Pembayaran::paginate(5);
        $pembayaran = Pembayaran::select('pembayarans.*', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->when($search, function ($pembayaran, $search) {
                            return $pembayaran->where('pembayarans.id',$search);
                        })
                        ->orderBy('nama')->paginate(5);
        return view('admin/pembayaran/laporan', compact('pembayarann', 'pembayaran', 'search'));
    }

    public function search(Request $request)
	{
        $search = $request->get('search');
        $pembayarann = Pembayaran::paginate(5);
        $pembayaran = Pembayaran::select('pembayarans.bulan', 'pembayarans.jumlah', 'pembayarans.keterangan', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->where('nama', 'like', "%".$search."%")
                        ->orWhere('bulan', 'like', "%".$search."%")
                        ->paginate(5);
        return view('admin/pembayaran/laporan', compact('pembayarann', 'pembayaran', 'search'));
    }

    public function pdf(Request $request, $id)
    {
        $pembayarann = Pembayaran::select('pembayarans.*')
                        ->where('pembayarans.id', $id)
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->when($id, function ($pembayaran, $id) {
                            return $pembayaran->where('pembayarans.id',$id);
                        })
                        ->orderBy('nama')->paginate(5);

        $pdf = PDF::loadView('admin/pembayaran/pdflaporan', compact('pembayarann', 'pembayaran', 'id'));
        return $pdf->stream('laporan.pdf');
    }

    public function showguru(Request $request)
    {
        $search = $request->search;
        $pembayarann = Pembayaran::paginate(5);
        $pembayaran = Pembayaran::select('pembayarans.*', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->when($search, function ($pembayaran, $search) {
                            return $pembayaran->where('pembayarans.id',$search);
                        })
                        ->orderBy('nama')->paginate(5);
        return view('guru/pembayaran/laporan', compact('pembayarann', 'pembayaran', 'search'));
    }

    public function searchguru(Request $request)
	{
        $search = $request->get('search');
        $pembayarann = Pembayaran::paginate(5);        
        $pembayaran = Pembayaran::select('pembayarans.bulan', 'pembayarans.jumlah', 'pembayarans.keterangan', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->where('nama', 'like', "%".$search."%")
                        ->orWhere('bulan', 'like', "%".$search."%")
                        ->paginate(5);
        return view('guru/pembayaran/laporan', compact('pembayarann', 'pembayaran', 'search'));
    }

    public function pdfguru(Request $request, $id)
    {
        $pembayarann = Pembayaran::select('pembayarans.*')
                        ->where('pembayarans.id', $id)
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->when($id, function ($pembayaran, $id) {
                            return $pembayaran->where('pembayarans.id',$id);
                        })
                        ->orderBy('nama')->paginate(5);

        $pdf = PDF::loadView('guru/pembayaran/pdflaporan', compact('pembayarann', 'pembayaran', 'id'));
        return $pdf->stream('laporan.pdf');
    }

    public function showtu(Request $request)
    {
        $search = $request->search;

        $pembayarann = Pembayaran::paginate(5);
        $pembayaran = Pembayaran::select('pembayarans.*', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->when($search, function ($pembayaran, $search) {
                            return $pembayaran->where('pembayarans.id',$search);
                        })
                        ->orderBy('nama')->paginate(5);
        return view('TU/pembayaran/laporan', compact('pembayarann', 'pembayaran', 'search'));
    }

    public function searchtu(Request $request)
	{
        $search = $request->get('search');
        $pembayarann = Pembayaran::paginate(5);
        $pembayaran = Pembayaran::select('pembayarans.bulan', 'pembayarans.jumlah', 'pembayarans.keterangan', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->where('nama', 'like', "%".$search."%")
                        ->paginate(5);
        return view('TU/pembayaran/laporan', compact('pembayarann', 'pembayaran', 'search'));
    }

    public function pdftu(Request $request, $id)
    {
        $pembayarann = Pembayaran::select('pembayarans.*')
                        ->where('pembayarans.id', $id)
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->when($id, function ($pembayaran, $id) {
                            return $pembayaran->where('pembayarans.id',$id);
                        })
                        ->orderBy('nama')->paginate(5);

        $pdf = PDF::loadView('TU/pembayaran/pdflaporan', compact('pembayarann', 'pembayaran', 'id'));
        return $pdf->stream('laporan.pdf');
    }

    public function export($id) 
    {
            $data = array(
                    'id'=> $id
            );
        return Excel::download(new LaporanExport($data), 'laporanPembayaran.xlsx');
    }
}