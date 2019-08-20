<?php

namespace App\Http\Controllers;

use App\Exports\JurusanExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Jurusan;
use PDF;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('admin/jurusan/tabeljurusan', compact('jurusan'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexguru()
    {
        $jurusan = Jurusan::all();
        return view('guru/jurusan/tabeljurusan', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin/jurusan/formjurusan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $jurusans = new Jurusan;
        // $jurusans->jurusan = $request->jurusan;
        // $jurusans->save();

        // return "jurusan berhasil dimasukkan";

        $jurusan = new Jurusan();
        $jurusan->jurusan = $request->jurusan;
        $jurusan->save();
        return redirect()->route('jurusan.index')->with('alert-success','Berhasil Menambahkan jurusan');
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
        $jurusan = Jurusan::where('id',$id)->get();
        return view('admin/jurusan/editjurusan',compact('jurusan')); 
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
        // $jurusan = $request->jurusan;

        // $jurusan = Jurusan::find($id);
        // $jurusan->jurusan = $jurusan;

        // return "jurusan berhasil diupdate";

        $jurusan = Jurusan::where('id',$id)->first();
        $jurusan->jurusan = $request->jurusan;
        $jurusan->save();
        return redirect()->route('jurusan.index')->with('alert-success','jurusan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $jurusan = Jurusan::find($id);
        // $jurusan->delete();

        // return "jurusan berhasil dihapus";

        $jurusan = Jurusan::where('id',$id)->first();
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('alert-success','jurusan berhasil dihapus');
    }

    public function search(Request $request)
	{
        $search = $request->get('search');
        
		$jurusan = Jurusan::where('jurusan','like',"%".$search."%")->get();
 
    	return view('admin/jurusan/tabeljurusan', compact('jurusan', 'search'));
 
    }

    public function pdf()
    {
        $jurusan = Jurusan::all();

        $pdf = PDF::loadView('admin/jurusan/pdfjurusan', compact('jurusan'));
        return $pdf->stream('pdfjurusan.pdf');
    }

    public function export() 
    {
        return Excel::download(new JurusanExport, 'jurusan.xlsx');
    }
}
