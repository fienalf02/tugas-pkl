<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa_kelas;

class SiswaKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswak = Siswa_kelas::all();
        return $siswak;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswak = new Siswa_kelas;
        $siswak->id_siswa = $request->id_siswa;
        $siswak->id_kelas = $request->id_siswa;
        $siswak->save();
        
        return "Data berhasil dimasukkan";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $id_siswa = $request->id_siswa;
        $id_kelas = $request->id_kelas;

        $siswak = Siswa_kelas::find($id);
        $siswak->id_siswa = $id_siswa;
        $siswak->id_kelas = $id_kelas;
        $siswak->save();
        
        
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
        $siswak = Siswa_kelas::find($id);
        $siswak->delete();

        return "Data berhasil dihapus";
    }
}
