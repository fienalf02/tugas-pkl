<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Mapel::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = new Siswa;
        $mapel->mapel = $request->mapel;
        $mapel->KKM = $request->KKM;
        $mapel->save();

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
        $mapel = $request->mapel;
        $KKM = $request->KKM;

        $mapel = Mapel::find($id);
        $mapel->mapel = $mapel;
        $mapel->KKM = $KKM;
        $mapel->save();

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
        $mapel = Mapel::find($id);
        $mapel->delete();

        return "Data berhasil dihapus";
    }
}
