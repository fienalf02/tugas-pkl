<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nilai;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilais = Nilai::all();
        return view('tabelnilai', compact('nilais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nilai = new Nilai;
        $nilai->id_jadwal = $request->id_jadwal;
        $nilai->semester = $request->semester;
        $nilai->tahun_ajaran = $request->tahun_ajaran;
        $nilai->rapot = $request->rapot;
        $nilai->save();

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
        $id_jadwal = $request->id_jadwal;
        $semester = $request->semester;
        $tahun_ajaran = $request->tahun_ajaran;
        $rapot = $request->rapot;

        $nilai = Nilai::find($id);
        $nilai->id_jadwal = $id_jadwal;
        $nilai->semester = $semester;
        $nilai->tahun_ajaran = $tahun_ajaran;
        $nilai->rapot = $rapot;
        $nilai->save();

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
        $nilai = Nilai::find($id);
        $nilai->delete();

        return "Data berhasil dihapus";
    }
}
