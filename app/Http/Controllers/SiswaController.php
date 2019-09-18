<?php

namespace App\Http\Controllers;

use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Siswa;
use App\Siswa_kelas;
use App\Kelas;
use App\User;
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
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('jurusan')->paginate(5);
        return view('admin/siswa/tabelsiswa', compact('siswa', 'kelas', 'guru','search'));
    }

    public function indexguru(Request $request)
    {
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('jurusan')->paginate(5);
        return view('guru/siswa/tabelsiswa', compact('siswa', 'kelas', 'guru','search'));
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
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'kelas.kelas', 'siswas.id as id_siswa', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('jurusan')->paginate(5);
        return view('admin/siswa/tabelnilaisiswa', compact('siswa', 'kelas', 'guru', 'search'));
    }

    public function nilaiguru(Request $request)
    {
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('jurusan')->paginate(5);
        return view('guru/siswa/tabelnilaisiswa', compact('siswa', 'kelas', 'guru', 'search'));
    }

    public function pembayaran(Request $request)
    {
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('jurusan')->paginate(5);
        return view('admin/siswa/tabelsppsiswa', compact('siswa', 'kelas', 'guru', 'search'));
    }

    public function pembayaranguru(Request $request)
    {
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('jurusan')->paginate(5);
        return view('guru/siswa/tabelsppsiswa', compact('siswa', 'kelas', 'guru', 'search'));
    }

    public function pembayarantu(Request $request)
    {
        $search = $request->search;
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->when($search, function ($siswa, $search) {
                        return $siswa->where('siswa_kelas.id_kelas',$search);
                    })
                ->orderBy('jurusan')->paginate(5);
        return view('TU/siswa/tabelsppsiswa', compact('siswa', 'kelas', 'guru', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::paginate(5);
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $siswa_kelas = Siswa_kelas::paginate(5);
        $guru = Guru::paginate(5);
        $user = User::paginate(5);
        return view('admin/siswa/formsiswa', compact('siswa', 'kelas', 'siswa_kelas', 'guru', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->nama;
        $user->username = $request->NIS;
        $user->password = bcrypt($request->nama);
        $user->role = 'SISWA';
        $user->save();

        $siswa = new Siswa();
        $siswa->NIS = $request->NIS;
        $siswa->nama = $request->nama;
        $siswa->JK = $request->JK;
        $siswa->id_user = $user->id;
        $siswa->save();
//dd($siswa);
        $siswa_kelas = new Siswa_kelas();
        $siswa_kelas->id_siswa = $siswa->id;
        $siswa_kelas->id_kelas = $request->id_kelas;
        $siswa_kelas->id_guru = $request->id_guru;
        $siswa_kelas->save();

        
        return redirect()->route('siswa.index')->withSuccessMessage('Berhasil Menambahkan Data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'kelas.id as id_kelas', 'gurus.id as id_guru', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->where('siswas.id', $id)->paginate(5);
        $user = User::paginate(5);
        return view('admin/siswa/editsiswa', compact('siswa', 'kelas', 'guru', 'user')); 
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

        $user = User::where('id',$siswa->id_user)->first();
        $user->name = $request->nama;
        $user->username = $request->NIS;
        $user->password = bcrypt($request->nama);
        $user->role = 'SISWA';
        $user->save();

        $siswa_kelas = Siswa_kelas::where('id_siswa',$id)->first();
        $siswa_kelas->id_siswa = $siswa->id;
        $siswa_kelas->id_kelas = $request->id_kelas;
        $siswa_kelas->id_guru = $request->id_guru;
        $siswa_kelas->save();

        return redirect()->route('siswa.index')->withSuccessMessage('Berhasil Mengubah Data');
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
        $user = User::where('id', $siswa->id_user)->first();
        $user->delete();
        return redirect()->route('siswa.index')->withSuccessMessage('Berhasil Mengubah Data');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->where('NIS', 'like', "%".$search."%")
                ->orWhere('nama', 'like', "%".$search."%")
                ->paginate(5);
 
        return view('admin/siswa/tabelsiswa', compact('siswa', 'search', 'kelas', 'guru'));
    }

    public function searchnilai(Request $request)
    {
        $search = $request->get('search');
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->where('NIS', 'like', "%".$search."%")
                ->orWhere('nama', 'like', "%".$search."%")
                ->paginate(5);
 
        return view('admin/siswa/tabelnilaisiswa', compact('siswa', 'search', 'kelas', 'guru'));
 
    }

    public function searchspp(Request $request)
{
        $search = $request->get('search');
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->where('NIS', 'like', "%".$search."%")
                ->orWhere('nama', 'like', "%".$search."%")
                ->paginate(5);
         
        return view('admin/siswa/tabelsppsiswa', compact('siswa', 'search', 'kelas', 'guru'));
    }

    //ROLE GURU
    public function searchguru(Request $request)
    {
        $search = $request->get('search');
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->where('NIS', 'like', "%".$search."%")
                ->orWhere('nama', 'like', "%".$search."%")
                ->paginate(5);
 
        return view('guru/siswa/tabelsiswa', compact('siswa', 'search', 'kelas', 'guru'));
 
    }

    public function searchnilaiguru(Request $request)
    {
        $search = $request->get('search');
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->where('NIS', 'like', "%".$search."%")
                ->orWhere('nama', 'like', "%".$search."%")
                ->paginate(5);
 
        return view('guru/siswa/tabelnilaisiswa', compact('siswa', 'search', 'kelas', 'guru'));
 
    }

    public function searchsppguru(Request $request)
    {
        $search = $request->get('search');
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
        ->join('users', 'users.id', '=', 'siswas.id_user')
                ->where('NIS', 'like', "%".$search."%")
                ->orWhere('nama', 'like', "%".$search."%")
                ->paginate(5);
 
        return view('guru/siswa/tabelsppsiswa', compact('siswa', 'search', 'kelas', 'guru'));
    }

    //ROLE TU
    public function searchTU(Request $request)
    {
        $search = $request->get('search');
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->paginate(5);
        $guru = Guru::paginate(5);
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
        ->join('users', 'users.id', '=', 'siswas.id_user')
                ->where('NIS', 'like', "%".$search."%")
                ->orWhere('nama', 'like', "%".$search."%")
                ->paginate(5);
 
        return view('TU/siswa/tabelsppsiswa', compact('siswa', 'search', 'kelas', 'guru'));
    }

    public function pdf(Request $request, $id)
    {
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::get();
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->when($id, function ($siswa, $id) {
                        return $siswa->where('siswa_kelas.id_kelas',$id);
                    })
                ->orderBy('jurusan')->get();

        $pdf = PDF::loadView('admin/siswa/pdfsiswa', compact('siswa', 'kelas', 'guru', 'id'));
        return $pdf->stream('pdfsiswa.pdf');
        
    }

    public function pdfguru(Request $request, $id)
    {
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();
        $guru = Guru::get();
        $siswa = Siswa::select('siswas.*', 'siswas.id as id_siswa', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru', 'users.*')
                ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('users', 'users.id', '=', 'siswas.id_user')
                ->when($id, function ($siswa, $id) {
                        return $siswa->where('siswa_kelas.id_kelas',$id);
                    })
                ->orderBy('jurusan')->get();

        $pdf = PDF::loadView('guru/siswa/pdfsiswa', compact('siswa', 'kelas', 'guru', 'id'));
        return $pdf->stream('pdfsiswa.pdf');
    }
    
    public function export($id) 
    {
            $data = array(
                    'id'=> $id
            );
        return Excel::download(new SiswaExport($data), 'siswa.xlsx');
    }
}
