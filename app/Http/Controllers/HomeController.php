<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Guru;
use App\Siswa;
use App\Jurusan;
use App\Kelas;

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
        return view('home', compact('countGuru', 'countSiswa', 'countKelas', 'countJurusan'));
    }

}
