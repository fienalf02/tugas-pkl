<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Guru;
use App\Siswa;
use App\Jurusan;
use App\Kelas;
use App\Nilai;
use App\Mapel;
use App\Jadwal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $countGuru = Guru::all();
        $countSiswa = Siswa::all();
        $countKelas = Kelas::all();
        $countJurusan = Jurusan::all();
        $countJadwal = Jadwal::all();
        $countMapel = Mapel::all();
        $countNilai = Nilai::all();
        return view('home', compact('countGuru', 'countSiswa', 'countKelas', 'countJurusan', 'countNilai', 'countMapel', 'countJadwal'));
    }

    public function register()
    {
        return view('auth/register');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function store(Request $request)
    {
        $user = new User();
        $user = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|unique:users',
            'role' => 'required|string|max:15',
            'password' => 'required|string|min:4|confirmed',
        ]);
        User::create($user);
        return redirect()->route('home')->withSuccessMessage('Berhasil Menambahkan Data');
    }

    
}
