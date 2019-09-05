<?php

namespace App\Http\Controllers;

use App\Exports\KelasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Kelas;
use App\Jurusan;
use PDF;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->orderBy('kelas')->paginate(5);
        return view('admin/kelas/tabelkelas', compact('kelas')); 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexguru()
    {
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->orderBy('kelas')->paginate(5);
        return view('guru/kelas/tabelkelas', compact('kelas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jurusan = Jurusan::paginate(5);
        return view('admin/kelas/formkelas', compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $kelas =  new Kelas;
        // $kelas->id_jurusan = $request->id_jurusan;
        // $kelas->kelas = $request->kelas;
        // $kelas->save();

        // return "Data berhasil dimasukkan";

        $kelas = new Kelas();
        $kelas->kelas = $request->kelas;
        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->urutan = $request->urutan;
        $kelas->save();
        return redirect()->route('kelas.index')->withSuccessMessage('Berhasil Menambahkan Data');
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
        $kelas = Kelas::where('id', $id)->paginate(5);
        $jurusan = Jurusan::paginate(5);
        return view('admin/kelas/editkelas', compact('kelas', 'jurusan')); 
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
        // $id_jurusan = $request->id_jurusan;
        // $kelas = $request->kelas;

        // $kelass = Kelas::find($id);
        // $kelass->id_jurusan = $id_jurusan;
        // $kelass->kelas = $kelas;
        // $kelass->save();

        // return "Data berhasil diUpdate";

        $kelas = Kelas::where('id',$id)->first();
        $kelas->kelas = $request->kelas;
        $kelas->id_jurusan = $request->id_jurusan;
        $kelas->urutan = $request->urutan;
        $kelas->save();
        return redirect()->route('kelas.index')->withSuccessMessage('Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $kelas = Kelas::find($id);
        // $kelas->delete();

        // return "Data berhasil dihapus";

        $kelas = Kelas::where('id',$id)->first();
        $kelas->delete();
        return redirect()->route('kelas.index')->withSuccessMessage('Berhasil Menghapus Data');
    }

    public function search(Request $request)
	{
        $search = $request->get('search');
        
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
        ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
        ->where('kelas.kelas', 'LIKE', '%'.$search.'%')
        ->orWhere('jurusans.jurusan', 'LIKE', '%'.$search.'%')
        ->orWhere('kelas.urutan', 'LIKE', '%'.$search.'%')->paginate(5);
 
    	return view('admin/kelas/tabelkelas', compact('kelas', 'search'));
 
    }

    public function searchguru(Request $request)
	{
        $search = $request->get('search');
        
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
        ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
        ->where('kelas.kelas', 'LIKE', '%'.$search.'%')
        ->orWhere('jurusans.jurusan', 'LIKE', '%'.$search.'%')
        ->orWhere('kelas.urutan', 'LIKE', '%'.$search.'%')->paginate(5);
 
    	return view('guru/kelas/tabelkelas', compact('kelas', 'search'));
 
    }

    public function pdf()
    {
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();

        $pdf = PDF::loadView('admin/kelas/pdfkelas', compact('kelas'));
        return $pdf->stream('pdfkelas.pdf');
    }

    public function pdfguru()
    {
        $kelas = Kelas::select('kelas.*', 'jurusans.jurusan')
                ->leftJoin('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')->get();

        $pdf = PDF::loadView('guru/kelas/pdfkelas', compact('kelas'));
        return $pdf->stream('pdfkelas.pdf');
    }

    public function export() 
    {
        return Excel::download(new KelasExport, 'kelas.xlsx');
    }
}
