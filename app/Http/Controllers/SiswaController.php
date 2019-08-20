<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Siswa;
use App\Siswa_kelas;
use App\Kelas;
use App\Guru;
use PDF;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('nama')->get();
        return view('admin/siswa/tabelsiswa', compact('siswa', 'kelas', 'guru'));
    }

    public function indexguru(Request $request)
    {
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('nama')->get();
        return view('guru/siswa/tabelsiswa', compact('siswa', 'kelas', 'guru'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function nilai(Request $request)
    {

        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('nama')->get();
        return view('admin/siswa/tabelnilaisiswa', compact('siswa', 'kelas', 'guru'));
    }

    public function nilaiguru(Request $request)
    {

        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('nama')->get();
        return view('guru/siswa/tabelnilaisiswa', compact('siswa', 'kelas', 'guru'));
    }

    public function pembayaran(Request $request)
    {
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('nama')->get();
        return view('admin/siswa/tabelsppsiswa', compact('siswa', 'kelas', 'guru'));
    }

    public function pembayaranguru(Request $request)
    {
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('nama')->get();
        return view('guru/siswa/tabelsppsiswa', compact('siswa', 'kelas', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $siswa_kelas = Siswa_kelas::all();
        $guru = Guru::all();
        return view('admin/siswa/formsiswa', compact('siswa', 'kelas', 'siswa_kelas', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = new Siswa();
        $siswa->NIS = $request->NIS;
        $siswa->nama = $request->nama;
        $siswa->JK = $request->JK;
        $siswa->save();
//dd($siswa);
        $siswa_kelas = new Siswa_kelas();
        $siswa_kelas->id_siswa = $siswa->id;
        $siswa_kelas->id_kelas = $request->id_kelas;
        $siswa_kelas->id_guru = $request->id_guru;
        $siswa_kelas->save();
        
        return redirect()->route('siswa.index')->with('alert-success','Berhasil Menambahkan Data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::where('id', $id)->get();
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $siswa_kelas = Siswa_kelas::all();
        $guru = Guru::all();
        return view('admin/siswa/editsiswa', compact('siswa', 'kelas', 'siswa_kelas', 'guru')); 
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
        $siswa = Siswa::where('id',$id)->first();
        $siswa->NIS = $request->NIS;
        $siswa->nama = $request->nama;
        $siswa->JK = $request->JK;
        $siswa->save();

        $siswa_kelas = Siswa_kelas::where('id_siswa',$id)->first();
        $siswa_kelas->id_siswa = $siswa->id;
        $siswa_kelas->id_kelas = $request->id_kelas;
        $siswa_kelas->id_guru = $request->id_guru;
        $siswa_kelas->save();

        return redirect()->route('siswa.index')->with('alert-success','siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::where('id', $id)->first();
        $siswa->delete();
        return redirect()->route('siswa.index')->with('alert-success','Data berhasil dihapus');
    }

    public function search(Request $request)
	{
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->get();
        return view('admin/siswa/tabelsiswa', compact('siswa', 'kelas', 'guru'));
 
    }

    public function searchnilai(Request $request)
	{
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->get();
        return view('admin/siswa/tabelnilaisiswa', compact('siswa', 'kelas', 'guru'));
 
    }

    public function searchspp(Request $request)
	{
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->get();
        return view('admin/siswa/tabelappsiswa', compact('siswa', 'kelas', 'guru'));
    }

    //guru
    public function searchguru(Request $request)
	{
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->get();
        return view('guru/siswa/tabelsiswa', compact('siswa', 'kelas', 'guru'));
    }

    public function searchnilaiguru(Request $request)
	{
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->get();
        return view('guru/siswa/tabelnilaisiswa', compact('siswa', 'kelas', 'guru'));
 
    }

    public function searchsppguru(Request $request)
	{
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::all();
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->get();
        return view('guru/siswa/tabelappsiswa', compact('siswa', 'kelas', 'guru'));
    }

    public function pdf()
    {
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
        ->get();

        $pdf = PDF::loadView('admin/siswa/pdfsiswa', compact('siswa'));
        return $pdf->stream('pdfsiswa.pdf');
    }
    
    public function export() 
    {
        return Excel::download(new SiswaExport, 'siswa.xlsx');
    }
}
