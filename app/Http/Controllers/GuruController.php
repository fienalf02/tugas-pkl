<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Guru::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $guru = new Guru;
        $guru->NIP = $request->NIP;
        $guru->nama = $request->nama;
        $guru->JK = $request->JK;
        $guru->password = $request->password;
        $guru->save();

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
        $NIP = $request->NIP;
        $nama = $request->nama;
        $JK = $request->JK;
        $password = $request->password;

        $guru = Guru::find($id);
        $guru->NIP = $NIP;
        $guru->nama = $nama;
        $guru->JK = $JK;
        $guru->password = $password;
        $guru->save();

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
        $guru = Guru::find($id);
        $guru->delete();

        return "Data berhasil dihapus";
    }
}
