<?php

namespace App\Http\Controllers;

use App\Exports\GuruExport;
use App\Imports\GuruImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Guru;
use PDF;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guru = Guru::select('gurus.*')->orderBy('nama_guru')->get();
        return view('admin/guru/tabelguru', compact('guru'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexguru()
    {
        $guru = Guru::select('gurus.*')->orderBy('nama_guru')->get();
        return view('guru/guru/tabelguru', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        return view('admin/guru/formguru', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guru = new Guru();
        $guru->NIP = $request->NIP;
        $guru->nama_guru = $request->nama_guru;
        $guru->JK = $request->JK;
        $guru->save();
        return redirect()->route('guru.index')->with('alert-success','Berhasil Menambahkan Data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::where('id', $id)->get();
        return view('admin/guru/editguru', compact('guru')); 
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
        $guru = Guru::where('id',$id)->first();
        $guru->NIP = $request->NIP;
        $guru->nama_guru = $request->nama_guru;
        $guru->JK = $request->JK;
        $guru->save();
        return redirect()->route('guru.index')->with('alert-success','guru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::where('id', $id)->first();
        $guru->delete();
        return redirect()->route('guru.index')->with('alert-success','Data berhasil dihapus');
    }

    public function search(Request $request)
	{
        $search = $request->get('search');
        
        $guru = Guru::where('NIP', 'like', "%".$search."%")->
                orWhere('nama_guru', 'like', "%".$search."%")->get();
 
    	return view('admin/guru/tabelguru', compact('guru', 'search'));
    }

    public function pdf()
    {
        $gurus = Guru::all();

        $pdf = PDF::loadView('admin/guru/pdfguru', compact('gurus'));
        return $pdf->stream('pdfguru.pdf');
    }

    public function export() 
    {
        return Excel::download(new GuruExport, 'guru.xlsx');
    }

    public function import() 
    {
        Excel::import(new GuruImport, 'guru.xlsx');
        
        return redirect()->route('guru.index');
    }
}
