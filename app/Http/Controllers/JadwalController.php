<?php

namespace App\Http\Controllers;

use App\Exports\JadwalExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Jadwal;
use App\Guru;
use App\Mapel;
use PDF;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwal = Jadwal::select('jadwals.*', 'gurus.nama_guru', 'mapels.mapel')
                ->join('gurus', 'gurus.id', '=', 'jadwals.id_guru')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
                ->paginate(10);
        return view('admin/jadwal/tabeljadwal', compact('jadwal'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexguru()
    {
        $jadwal = Jadwal::select('jadwals.*', 'gurus.nama_guru', 'mapels.mapel')
                ->join('gurus', 'gurus.id', '=', 'jadwals.id_guru')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
                ->paginate(5);
        return view('guru/jadwal/tabeljadwal', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::paginate(5);
        $mapel = Mapel::paginate(5);
        return view('admin/jadwal/formjadwal', compact('guru', 'mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jadwal = new jadwal();
        $jadwal->hari = $request->hari;
        $jadwal->jam = $request->jam;
        $jadwal->ruangan = $request->ruangan;
        $jadwal->tahun_ajaran = $request->tahun_ajaran;
        $jadwal->id_guru = $request->id_guru;
        $jadwal->id_mapel = $request->id_mapel;
        $jadwal->save();
        return redirect()->route('jadwal.index')->withSuccessMessage('Berhasil Menambahkan Data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = jadwal::where('id', $id)->paginate(5);
        $guru = Guru::paginate(5);
        $mapel = Mapel::paginate(5);
        return view('admin/jadwal/editjadwal', compact('jadwal', 'guru', 'mapel')); 
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
        $jadwal = jadwal::where('id',$id)->first();
        $jadwal->hari = $request->hari;
        $jadwal->jam = $request->jam;
        $jadwal->ruangan = $request->ruangan;
        $jadwal->tahun_ajaran = $request->tahun_ajaran;
        $jadwal->id_guru = $request->id_guru;
        $jadwal->id_mapel = $request->id_mapel;
        $jadwal->save();
        return redirect()->route('jadwal.index')->withSuccessMessage('Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = jadwal::where('id', $id)->first();
        $jadwal->delete();
        return redirect()->route('jadwal.index')->withSuccessMessage('Berhasil Menghapus Data');
    }

    public function search(Request $request)
	{
        $search = $request->get('search');
        
        $jadwal = Jadwal::select('jadwals.*', 'gurus.nama_guru', 'mapels.mapel')
        ->join('gurus', 'gurus.id', '=', 'jadwals.id_guru')
        ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
        ->where('gurus.nama_guru', 'LIKE', '%'.$search.'%')
        ->orWhere('mapels.mapel', 'LIKE', '%'.$search.'%')
        ->orWhere('jadwals.hari', 'LIKE', '%'.$search.'%')
        ->paginate(5);
 
    	return view('admin/jadwal/tabeljadwal', compact('jadwal', 'search'));
 
    }
    public function searchguru(Request $request)
	{
        $search = $request->get('search');
        
        $jadwal = Jadwal::select('jadwals.*', 'gurus.nama_guru', 'mapels.mapel')
        ->join('gurus', 'gurus.id', '=', 'jadwals.id_guru')
        ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
        ->where('gurus.nama_guru', 'LIKE', '%'.$search.'%')
        ->orWhere('mapels.mapel', 'LIKE', '%'.$search.'%')
        ->orWhere('jadwals.hari', 'LIKE', '%'.$search.'%')
        ->paginate(5);
 
    	return view('guru/jadwal/tabeljadwal', compact('jadwal', 'search'));
 
    }

    public function pdf()
    {
        $jadwal = Jadwal::select('jadwals.*', 'gurus.nama_guru', 'mapels.mapel')
                ->join('gurus', 'gurus.id', '=', 'jadwals.id_guru')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
                ->get();

        $pdf = PDF::loadView('admin/jadwal/pdfjadwal', compact('jadwal'));
        return $pdf->stream('pdfjadwal.pdf');
    }

    public function pdfguru()
    {
        $jadwal = Jadwal::select('jadwals.*', 'gurus.nama_guru', 'mapels.mapel')
                ->join('gurus', 'gurus.id', '=', 'jadwals.id_guru')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
                ->get();

        $pdf = PDF::loadView('guru/jadwal/pdfjadwal', compact('jadwal'));
        return $pdf->stream('pdfjadwal.pdf');
    }

    public function export() 
    {
        return Excel::download(new JadwalExport, 'jadwal.xlsx');
    }
}
