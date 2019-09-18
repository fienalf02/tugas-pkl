<?php

namespace App\Http\Controllers;

use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
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
                    ->paginate(5);
        return view('admin/pembayaran/formpembayaran', compact('pembayaran', 'id'));
    }

    public function createTU($id)
    {
        $pembayaran = Pembayaran::select('pembayarans.*', 'siswas.nama')
                    ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                    ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                    ->paginate(5);
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
        $pembayaran->jumlah = $request->jumlah;
        $pembayaran->keterangan = $request->keterangan;
        $pembayaran->save();

        return redirect()->route('pembayaran.show', $request->id_siswakelas)->withSuccessMessage('Berhasil Menambahkan Data');
    }

    public function storeTU(Request $request)
    {

        $pembayaran = new Pembayaran();
        $pembayaran->id_siswakelas = $request->id_siswakelas;
        $pembayaran->bulan = $request->bulan;
        $pembayaran->jatuh_tempo = $request->jatuh_tempo;
        $pembayaran->tgl_bayar = $request->tgl_bayar;
        $pembayaran->jumlah = $request->jumlah;
        $pembayaran->keterangan = $request->keterangan;
        $pembayaran->save();

        return redirect()->route('pembayaran.showTU', $request->id_siswakelas)->withSuccessMessage('Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.id as id_siswa', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->join('users', 'users.id', '=', 'siswas.id_user')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->paginate(5);
        return view('admin/pembayaran/tabelpembayaran', compact('pembayaran', 'detail_siswa', 'id'));
    }
    
    public function showguru($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.id as id_siswa', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->join('users', 'users.id', '=', 'siswas.id_user')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->paginate(5);
        return view('guru/pembayaran/tabelpembayaran', compact('pembayaran', 'detail_siswa', 'id'));
    }

    public function showTU($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.id as id_siswa', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->join('users', 'users.id', '=', 'siswas.id_user')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->paginate(5);
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
        $pembayaran = Pembayaran::where('id', $id)->paginate(5);
        $siswakelas = Siswa_kelas::select('siswa_kelas.*', 'siswas.nama')
                    ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                    ->paginate(5);
        return view('admin/pembayaran/editpembayaran', compact('pembayaran', 'siswakelas'));
    }

    public function editTU($id)
    {
        $pembayaran = Pembayaran::where('id', $id)->paginate(5);
        $siswakelas = Siswa_kelas::select('siswa_kelas.*', 'siswas.nama')
                    ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                    ->paginate(5);
        return view('TU/pembayaran/editpembayaran', compact('pembayaran', 'siswakelas'));
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
        $pembayaran->jumlah = $request->jumlah;
        $pembayaran->save();

        return redirect()->route('pembayaran.show', $request->id_siswakelas)->withSuccessMessage('Berhasil Mengubah Data');
    }

    public function updateTU(Request $request, $id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran->id_siswakelas = $request->id_siswakelas;
        $pembayaran->bulan = $request->bulan;
        $pembayaran->jumlah = $request->jumlah;
        $pembayaran->save();

        return redirect()->route('pembayaran.showTU', $request->id_siswakelas)->withSuccessMessage('Berhasil Mengubah Data');
    }

    public function bayar(Request $request, $id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran->tgl_bayar = date('Y-m-d');
        $pembayaran->keterangan = 'LUNAS';
        $pembayaran->save();

        return redirect()->route('pembayaran.show', $pembayaran->id_siswakelas)->withLunasMessage('Berhasil Mengubah Data');
    }

    public function bayarTU(Request $request, $id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran->tgl_bayar = date('Y-m-d');
        $pembayaran->keterangan = 'LUNAS';
        $pembayaran->save();

        return redirect()->route('pembayaran.showTU', $pembayaran->id_siswakelas)->withLunasMessage('Berhasil Mengubah Data');
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
        return redirect()->route('pembayaran.show', $pembayaran->id_siswakelas)->withSuccessMessage('Berhasil Menghapus Data');
    }

    public function destroyTU($id)
    {
        $pembayaran = Pembayaran::where('id', $id)->first();
        $pembayaran->delete();
        return redirect()->route('pembayaran.showTU', $pembayaran->id_siswakelas)->withSuccessMessage('Berhasil Menghapus Data');
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
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->where('bulan', 'like', "%".$search."%")
                        ->orWhere('keterangan', 'like', "%".$search."%")
                        ->paginate(5);
        return view('admin/pembayaran/tabelpembayaran', compact('pembayaran', 'search', 'detail_siswa', 'id'));
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
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->where('bulan', 'like', "%".$search."%")
                        ->orWhere('keterangan', 'like', "%".$search."%")
                        ->paginate(5);
        return view('TU/pembayaran/tabelpembayaran', compact('pembayaran', 'search', 'detail_siswa', 'id'));
    }


    public function pdf($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('pembayarans.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->join('pembayarans', 'pembayarans.id_siswakelas', '=', 'siswa_kelas.id')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->where('pembayarans.id', $id)
                        ->get();

        $pdf = PDF::loadView('admin/pembayaran/pdfpembayaran', compact('detail_siswa', 'pembayaran'));
        return $pdf->stream('pdfpembayaran.pdf');
    }

    public function pdfall($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.id as id_siswa', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->join('users', 'users.id', '=', 'siswas.id_user')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->get();

        $pdf = PDF::loadView('admin/pembayaran/pdfpembayaranall', compact('detail_siswa', 'pembayaran', 'id'));
        return $pdf->stream('pdfpembayaran.pdf');
    }

    public function pdfallguru($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.id as id_siswa', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->join('users', 'users.id', '=', 'siswas.id_user')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->get();

        $pdf = PDF::loadView('guru/pembayaran/pdfpembayaran', compact('detail_siswa', 'pembayaran', 'id'));
        return $pdf->stream('pdfpembayaran.pdf');
    }

    public function pdftu($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('pembayarans.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->join('pembayarans', 'pembayarans.id_siswakelas', '=', 'siswa_kelas.id')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->where('pembayarans.id', $id)
                        ->get();

        $pdf = PDF::loadView('TU/pembayaran/pdfpembayaran', compact('detail_siswa', 'pembayaran'));
        return $pdf->stream('pdfpembayaran.pdf');
    }

    public function pdfalltu($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.id as id_siswa', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->join('users', 'users.id', '=', 'siswas.id_user')
                        ->first();
        $pembayaran = Pembayaran::select('pembayarans.*')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id', '=', 'pembayarans.id_siswakelas')
                        ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                        ->get();

        $pdf = PDF::loadView('TU/pembayaran/pdfpembayaranall', compact('detail_siswa', 'pembayaran', 'id'));
        return $pdf->stream('pdfpembayaran.pdf');
    }

    public function export() 
    {
        return Excel::download(new PembayaranExport, 'pembayaran.xlsx');
    }
}
