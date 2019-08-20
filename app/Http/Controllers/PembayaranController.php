<?php

namespace App\Http\Controllers;

use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Pembayaran;
use App\Siswa_kelas;
use App\Kelas;
use App\Guru;
use App\Siswa;
use PDF;

class PembayaranController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pembayaran = Pembayaran::select('pembayarans.*', 'siswas.nama')
                    ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                    ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                    ->get();
        return view('admin/pembayaran/formpembayaran', compact('pembayaran', 'id'));
    }

    public function createTU($id)
    {
        $pembayaran = Pembayaran::select('pembayarans.*', 'siswas.nama')
                    ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                    ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                    ->get();
        return view('TU/pembayaran/formpembayaran', compact('pembayaran', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pembayaran = new Pembayaran();
        $pembayaran->id_siswakelas = $request->id_siswakelas;
        $pembayaran->bulan = $request->bulan;
        $pembayaran->jatuh_tempo = $request->jatuh_tempo;
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->nomor = $request->nomor;
        $pembayaran->jumlah = $request->jumlah;
        $pembayaran->keterangan = $request->keterangan;
        $pembayaran->save();

        return redirect()->route('pembayaran.show', $request->id_siswakelas)->with('alert-success','Berhasil Menambahkan Data');
    }

    public function storeTU(Request $request)
    {

        $pembayaran = new Pembayaran();
        $pembayaran->id_siswakelas = $request->id_siswakelas;
        $pembayaran->bulan = $request->bulan;
        $pembayaran->jatuh_tempo = $request->jatuh_tempo;
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->nomor = $request->nomor;
        $pembayaran->jumlah = $request->jumlah;
        $pembayaran->keterangan = $request->keterangan;
        $pembayaran->save();

        return redirect()->route('pembayaran.showTU', $request->id_siswakelas)->with('alert-success','Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->get();
        return view('admin/pembayaran/tabelpembayaran', compact('pembayaran', 'detail_siswa', 'id'));
    }
    
    public function showguru($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->get();
        return view('guru/pembayaran/tabelpembayaran', compact('pembayaran', 'detail_siswa', 'id'));
    }

    public function showTU($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->get();
        return view('TU/pembayaran/tabelpembayaran', compact('pembayaran', 'detail_siswa', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::select('pembayarans.*', 'siswas.nama')
                    ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                    ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                    ->get();
        return view('admin/pembayaran/editpembayaran', compact('pembayaran'));
    }

    public function editTU($id)
    {
        $pembayaran = Pembayaran::select('pembayarans.*', 'siswas.nama')
                    ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                    ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                    ->get();
        return view('TU/pembayaran/editpembayaran', compact('pembayaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran->id_siswakelas = $request->id_siswakelas;
        $pembayaran->bulan = $request->bulan;
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->nomor = $request->nomor;
        $pembayaran->jumlah = $request->jumlah;
        $pembayaran->keterangan = $request->keterangan;
        $pembayaran->save();

        return redirect()->route('pembayaran.show', $request->id_siswakelas)->with('alert-success','Berhasil Menambahkan Data');
    }

    public function updateTU(Request $request, $id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran->id_siswakelas = $request->id_siswakelas;
        $pembayaran->bulan = $request->bulan;
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->nomor = $request->nomor;
        $pembayaran->jumlah = $request->jumlah;
        $pembayaran->keterangan = $request->keterangan;
        $pembayaran->save();

        return redirect()->route('pembayaran.showTU', $request->id_siswakelas)->with('alert-success','Berhasil Menambahkan Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran->delete();
        return redirect()->route('pembayaran.show', $pembayaran->id_siswakelas)->with('alert-success','Data berhasil dihapus');
    }

    public function destroyTU($id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran->delete();
        return redirect()->route('pembayaran.showTU', $pembayaran->id_siswakelas)->with('alert-success','Data berhasil dihapus');
    }


    public function search(Request $request, $id)
	{
        $search = $request->get('search');
        
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->get();
        return view('admin/pembayaran/tabelpembayaran', compact('pembayaran', 'search', 'detail_siswa', 'id'));
    }

    public function searchguru(Request $request, $id)
	{
        $search = $request->get('search');
        
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->get();
        return view('guru/pembayaran/tabelpembayaran', compact('pembayaran', 'search', 'detail_siswa', 'id'));
    }

    public function searchTU(Request $request, $id)
	{
        $search = $request->get('search');
        
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->get();
        return view('TU/pembayaran/tabelpembayaran', compact('pembayaran', 'search', 'detail_siswa', 'id'));
    }


    public function pdf()
    {
        $pembayaran = Pembayaran::select('pembayarans.*')
                    ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                    ->get();

        $pdf = PDF::loadView('admin/pembayaran/pdfpembayaran', compact('pembayaran'));
        return $pdf->stream('pdfpembayaran.pdf');
    }

    public function pdfTU()
    {
        $pembayaran = Pembayaran::select('pembayarans.*')
                    ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                    ->get();

        $pdf = PDF::loadView('TU/pembayaran/pdfpembayaran', compact('pembayaran'));
        return $pdf->stream('pdfpembayaran.pdf');
    }

    public function export() 
    {
        return Excel::download(new PembayaranExport, 'pembayaran.xlsx');
    }
}
