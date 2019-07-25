<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail_nilai;

class DetailNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_nilais = Detail_nilai::all();
        return view('tabeldetailnilai', compact('detail_nilais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $detailnilai = new Detail_nilai;
        $detailnilai->id_nilai = $request->id_nilai;
        $detailnilai->tugas = $request->tugas;
        $detailnilai->uts = $request->uts;
        $detailnilai->uas = $request->uas;
        $detailnilai->save();

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
        $id_nilai = $request->id_nilai;
        $tugas = $request->tugas;
        $uts = $request->uts;
        $uas = $request->uas;

        $detailnilai = Detail_nilai::find($id);
        $detailnilai->id_nilai = $id_nilai;
        $detailnilai->tugas = $tugas;
        $detailnilai->uts = $uts;
        $detailnilai->uas = $uas;
        $detailnilai->save();

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
        $detailnilai = Detail_nilai::find($id);
        $detailnilai->delete();

        return "Data berhasil dihapus";
    }
}
