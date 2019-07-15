<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Jadwal::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jadwal = new Jadwal;
        $jadwal->id_guru = $request->id_guru;
        $jadwal->id_mapel = $request->id_mapel;
        $jadwal->save();

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
        $id_guru = $request->id_guru;
        $id_mapel = $request->id_mapel;

        $jadwal = Jadwal::find($id);
        $jadwal->id_guru = $id_guru;
        $jadwal->id_mapel = $id_mapel;
        $jadwal->save();

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
        $jadwal = Jadwal::find($id);
        $jadwal->delete();

        return "Data berhasil dihapus";
    }
}
