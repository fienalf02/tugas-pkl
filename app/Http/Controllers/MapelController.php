<?php

namespace App\Http\Controllers;

use App\Exports\MapelExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Mapel;
use PDF;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapel = Mapel::all();
        return view('admin/mapel/tabelmapel', compact('mapel'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexguru()
    {
        $mapel = Mapel::all();
        return view('guru/mapel/tabelmapel', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapel = Mapel::all();
        return view('admin/mapel/formmapel', compact('mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mapel = new Mapel();
        $mapel->mapel = $request->mapel;
        $mapel->KKM = $request->KKM;
        $mapel->save();
        return redirect()->route('mapel.index')->with('alert-success','Berhasil Menambahkan mapel');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mapel = Mapel::where('id', $id)->get();
        return view('admin/mapel/editmapel', compact('mapel')); 
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
        // $mapel = $request->mapel;
        // $KKM = $request->KKM;

        // $matpel = Mapel::find($id);
        // $matpel->mapel = $mapel;
        // $matpel->KKM = $KKM;
        // $matpel->save();

        // return "mapel berhasil diupdate";

        $mapel = Mapel::where('id',$id)->first();
        $mapel->mapel = $request->mapel;
        $mapel->KKM = $request->KKM;
        $mapel->save();
        return redirect()->route('mapel.index')->with('alert-success','mapel berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $mapel = Mapel::find($id);
        // $mapel->delete();

        // return "mapel berhasil dihapus";

        $mapel = Mapel::where('id', $id)->first();
        $mapel->delete();
        return redirect()->route('mapel.index')->with('alert-success','mapel berhasil dihapus');
    }

    public function search(Request $request)
	{
        $search = $request->get('search');
        
        $mapel = Mapel::where('mapel','like',"%".$search."%")
                ->orWhere('KKM','like',"%".$search."%")
                ->get();
 
    	return view('admin/mapel/tabelmapel', compact('mapel', 'search'));
 
    }

    public function pdf()
    {
        $mapel = Mapel::all();

        $pdf = PDF::loadView('admin/mapel/pdfmapel', compact('mapel'));
        return $pdf->stream('pdfmapel.pdf');
    }

    public function export() 
    {
        return Excel::download(new MapelExport, 'mapel.xlsx');
    }
}
