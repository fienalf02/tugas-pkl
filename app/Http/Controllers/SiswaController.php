<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswas = Siswa::all();
        return view('tabelsiswa', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $siswa = new Siswa;
        $siswa->NIS = $request->NIS;
        $siswa->nama = $request->nama;
        $siswa->JK = $request->JK;
        $siswa->save();

        return "Data berhasil ditambahkan";

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
        $NIS = $request->NIS;
        $nama = $request->nama;
        $JK = $request->JK;

        $siswa = Siswa::find($id);
        $siswa->NIS = $NIS;
        $siswa->nama = $nama;
        $siswa->JK = $JK;
        $siswa->save();

        return "Data berhasil diupdate";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return "Data berhasil dihapus";
    }
}
