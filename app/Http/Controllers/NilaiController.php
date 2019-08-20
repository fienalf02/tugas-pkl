<?php

namespace App\Http\Controllers;

use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Nilai;
use App\Jadwal;
use App\Siswa;
use App\Siswa_kelas;
use App\Detail_nilai;
use App\Mapel;
use App\Guru;
use PDF;

class NilaiController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $nilai = Nilai::select('nilais.*', 'detail_nilais.tugas', 'detail_nilais.uts', 'detail_nilais.uas')
                ->join('detail_nilais', 'nilais.id', '=', 'detail_nilais.id_nilai')->get();
        $jadwal = Jadwal::select('mapels.mapel', 'jadwals.id')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')->get();
        $siswakelas = Siswa_kelas::select('siswa_kelas.*', 'siswas.nama', 'gurus.nama_guru', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                    ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                    ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                    ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                    ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                    ->get();
        return view('admin/nilai/formnilai', compact('nilai', 'jadwal', 'siswakelas', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createguru($id)
    {
        $nilai = Nilai::select('nilais.*', 'detail_nilais.tugas', 'detail_nilais.uts', 'detail_nilais.uas')
                ->join('detail_nilais', 'nilais.id', '=', 'detail_nilais.id_nilai')->get();
        $jadwal = Jadwal::select('mapels.mapel', 'jadwals.id')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')->get();
        $siswakelas = Siswa_kelas::select('siswa_kelas.*', 'siswas.nama', 'gurus.nama_guru', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                    ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                    ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                    ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                    ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                    ->get();
        return view('guru/nilai/formnilai', compact('nilai', 'jadwal', 'siswakelas', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nilai = new Nilai();
        $nilai->id_siswakelas = $request->id_siswakelas;
        $nilai->id_jadwal = $request->id_jadwal;
        $nilai->semester = $request->semester;
        $nilai->rapot = $request->rapot;
        $nilai->save();

        $Dnilai = new Detail_nilai();
        $Dnilai->id_nilai = $nilai->id;
        $Dnilai->tugas = $request->tugas;
        $Dnilai->uts = $request->uts;
        $Dnilai->uas = $request->uas;
        $Dnilai->save();
        return redirect()->route('nilai.show',$request->id_siswakelas)->with('alert-success','Berhasil Menambahkan Data');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeguru(Request $request)
    {
        $nilai = new Nilai();
        $nilai->id_siswakelas = $request->id_siswakelas;
        $nilai->id_jadwal = $request->id_jadwal;
        $nilai->semester = $request->semester;
        $nilai->rapot = $request->rapot;
        $nilai->save();

        $Dnilai = new Detail_nilai();
        $Dnilai->id_nilai = $nilai->id;
        $Dnilai->tugas = $request->tugas;
        $Dnilai->uts = $request->uts;
        $Dnilai->uas = $request->uas;
        $Dnilai->save();
        return redirect()->route('nilai.showguru',$request->id_siswakelas)->with('alert-success','Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->first();
        $nilai = Nilai::select('nilais.*', 'siswas.NIS', 'gurus.nama_guru', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'mapels.mapel', 'detail_nilais.uts', 'detail_nilais.uas', 'detail_nilais.tugas')
                ->join('detail_nilais', 'nilais.id', '=', 'detail_nilais.id_nilai')
                ->join('jadwals', 'jadwals.id', '=', 'nilais.id_jadwal')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
                ->join('siswa_kelas', 'siswa_kelas.id', '=', 'nilais.id_siswakelas')
                ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->get();
        return view('admin/nilai/tabelnilai', compact('nilai', 'id', 'detail_siswa'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showguru($id)
    {
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->first();
        $nilai = Nilai::select('nilais.*', 'siswas.NIS', 'gurus.nama_guru', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'mapels.mapel', 'detail_nilais.uts', 'detail_nilais.uas', 'detail_nilais.tugas')
                ->join('detail_nilais', 'nilais.id', '=', 'detail_nilais.id_nilai')
                ->join('jadwals', 'jadwals.id', '=', 'nilais.id_jadwal')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
                ->join('siswa_kelas', 'siswa_kelas.id', '=', 'nilais.id_siswakelas')
                ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->get();
        return view('guru/nilai/tabelnilai', compact('nilai', 'id', 'detail_siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nilai = Nilai::where('id', $id)->get();
        $Dnilai = Detail_nilai::where('id', $id)->get();
        $jadwal = Jadwal::select('mapels.mapel', 'jadwals.id')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')->get();
        $siswakelas = Siswa_kelas::select('siswa_kelas.*', 'siswas.nama', 'gurus.nama_guru', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                    ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                    ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                    ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                    ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                    ->get();
        return view('admin/nilai/editnilai', compact('nilai', 'jadwal', 'siswakelas', 'Dnilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editguru($id)
    {
        $nilai = Nilai::where('id', $id)->get();
        $Dnilai = Detail_nilai::where('id', $id)->get();
        $jadwal = Jadwal::select('mapels.mapel', 'jadwals.id')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')->get();
        $siswakelas = Siswa_kelas::select('siswa_kelas.*', 'siswas.nama', 'gurus.nama_guru', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan')
                    ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                    ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                    ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                    ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                    ->get();
        return view('guru/nilai/editnilai', compact('nilai', 'jadwal', 'siswakelas', 'Dnilai'));
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

        $nilai = Nilai::where('id',$id)->first();
        $nilai->id_siswakelas = $request->id_siswakelas;
        $nilai->id_jadwal = $request->id_jadwal;
        $nilai->semester = $request->semester;
        $nilai->rapot = $request->rapot;
        $nilai->save();

        $Dnilai = Detail_nilai::where('id_nilai',$id)->first();
        $Dnilai->id_nilai = $nilai->id;
        $Dnilai->tugas = $request->tugas;
        $Dnilai->uts = $request->uts;
        $Dnilai->uas = $request->uas;
        $Dnilai->save();

        return redirect()->route('nilai.show', $request->id_siswakelas)->with('alert-success','Data berhasil diubah');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateguru(Request $request, $id)
    {

        $nilai = Nilai::where('id',$id)->first();
        $nilai->id_siswakelas = $request->id_siswakelas;
        $nilai->id_jadwal = $request->id_jadwal;
        $nilai->semester = $request->semester;
        $nilai->rapot = $request->rapot;
        $nilai->save();

        $Dnilai = Detail_nilai::where('id_nilai',$id)->first();
        $Dnilai->id_nilai = $nilai->id;
        $Dnilai->tugas = $request->tugas;
        $Dnilai->uts = $request->uts;
        $Dnilai->uas = $request->uas;
        $Dnilai->save();

        return redirect()->route('nilai.showguru', $request->id_siswakelas)->with('alert-success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::where('id', $id)->first();
        $nilai->delete();
        return redirect()->route('nilai.show', $nilai->id_siswakelas)->with('alert-success','Data berhasil dihapus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyguru($id)
    {
        $nilai = Nilai::where('id', $id)->first();
        $nilai->delete();
        return redirect()->route('nilai.showguru', $nilai->id_siswakelas)->with('alert-success','Data berhasil dihapus');
    }

    public function search(Request $request, $id)
	{
        $search = $request->get('search');
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->first();
        $nilai = Nilai::select('nilais.*', 'siswas.NIS', 'gurus.nama_guru', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'mapels.mapel', 'detail_nilais.uts', 'detail_nilais.uas', 'detail_nilais.tugas')
                ->join('detail_nilais', 'nilais.id', '=', 'detail_nilais.id_nilai')
                ->join('jadwals', 'jadwals.id', '=', 'nilais.id_jadwal')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
                ->join('siswa_kelas', 'siswa_kelas.id', '=', 'nilais.id_siswakelas')
                ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas') 
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->where('mapels.mapel', $search)
                ->orWhere('detail_nilais.uts', $search)
                ->orWhere('detail_nilais.uas', $search)
                ->orWhere('detail_nilais.tugas', $search)
                ->orWhere('nilais.rapot', $search)
                ->get();
 
    	return view('admin/nilai/tabelnilai', compact('nilai', 'search', 'detail_siswa', 'id'));

    }

    public function searchguru(Request $request, $id)
	{
        $search = $request->get('search');
        $detail_siswa = Siswa::select('siswas.NIS', 'siswas.nama','kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'gurus.nama_guru')
                        ->where('siswas.id', $id)
                        ->join('siswa_kelas', 'siswa_kelas.id_siswa', '=', 'siswas.id')
                        ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                        ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                        ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                        ->first();
        $nilai = Nilai::select('nilais.*', 'siswas.NIS', 'gurus.nama_guru', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'mapels.mapel', 'detail_nilais.uts', 'detail_nilais.uas', 'detail_nilais.tugas')
                ->join('detail_nilais', 'nilais.id', '=', 'detail_nilais.id_nilai')
                ->join('jadwals', 'jadwals.id', '=', 'nilais.id_jadwal')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
                ->join('siswa_kelas', 'siswa_kelas.id', '=', 'nilais.id_siswakelas')
                ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas') 
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->where('mapels.mapel', $search)
                ->orWhere('detail_nilais.uts', $search)
                ->orWhere('detail_nilais.uas', $search)
                ->orWhere('detail_nilais.tugas', $search)
                ->orWhere('nilais.rapot', $search)
                ->get();
 
    	return view('guru/nilai/tabelnilai', compact('nilai', 'search', 'detail_siswa', 'id'));

    }

    public function pdf()
    {
        $nilai = Nilai::select('nilais.*', 'gurus.nama_guru', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'mapels.mapel', 'detail_nilais.uts', 'detail_nilais.uas', 'detail_nilais.tugas')
                ->join('detail_nilais', 'nilais.id', '=', 'detail_nilais.id_nilai')
                ->join('jadwals', 'jadwals.id', '=', 'nilais.id_jadwal')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
                ->join('siswa_kelas', 'siswa_kelas.id', '=', 'nilais.id_siswakelas')
                ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->get();

        $pdf = PDF::loadView('admin/nilai/pdfnilai', compact('nilai'));
        return $pdf->stream('pdfnilai.pdf');
    }

    public function pdfguru()
    {
        $nilai = Nilai::select('nilais.*', 'gurus.nama_guru', 'siswas.nama', 'kelas.kelas', 'jurusans.jurusan', 'kelas.urutan', 'mapels.mapel', 'detail_nilais.uts', 'detail_nilais.uas', 'detail_nilais.tugas')
                ->join('detail_nilais', 'nilais.id', '=', 'detail_nilais.id_nilai')
                ->join('jadwals', 'jadwals.id', '=', 'nilais.id_jadwal')
                ->join('mapels', 'mapels.id', '=', 'jadwals.id_mapel')
                ->join('siswa_kelas', 'siswa_kelas.id', '=', 'nilais.id_siswakelas')
                ->join('siswas', 'siswas.id', '=', 'siswa_kelas.id_siswa')
                ->join('gurus', 'gurus.id', '=', 'siswa_kelas.id_guru')
                ->join('kelas', 'kelas.id', '=', 'siswa_kelas.id_kelas')
                ->join('jurusans', 'jurusans.id', '=', 'kelas.id_jurusan')
                ->get();

        $pdf = PDF::loadView('guru/nilai/pdfnilai', compact('nilai'));
        return $pdf->stream('pdfnilai.pdf');
    }

    public function export() 
    {
        return Excel::download(new NilaiExport, 'nilai.xlsx');
    }

    // public function showSiswa($id){
    //     dd("ok");
    // }
}
