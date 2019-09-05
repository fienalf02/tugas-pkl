<?php

namespace App\Http\Controllers;

use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Guru;
use App\User;
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
        $guru = Guru::select('gurus.*')
                ->join('users', 'users.id', '=', 'gurus.id_user')
                ->orderBy('nama_guru')->paginate(5);
        return view('admin/guru/tabelguru', compact('guru'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexguru()
    {
        $guru = Guru::select('gurus.*')
                ->join('users', 'users.id', '=', 'gurus.id_user')
                ->orderBy('nama_guru')->paginate(5);
        return view('guru/guru/tabelguru', compact('guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::paginate(5);
        $user = User::paginate(5);
        return view('admin/guru/formguru', compact('guru', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->nama_guru;
        $user->username = $request->NIP;
        $user->password = bcrypt($request->nama_guru);
        $user->role = 'GURU';
        $user->save();

        $guru = new Guru();
        $guru->NIP = $request->NIP;
        $guru->nama_guru = $request->nama_guru;
        $guru->JK = $request->JK;
        $guru->id_user = $user->id;
        $guru->save();

        return redirect()->route('guru.index')->withSuccessMessage('Berhasil Menambahkan Data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru = Guru::where('id', $id)->paginate(5);
        $user = User::paginate(5);
        return view('admin/guru/editguru', compact('guru', 'user')); 
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

        $user = User::where('id',$guru->id_user)->first();
        $user->name = $request->nama_guru;
        $user->username = $request->NIP;
        $user->password = bcrypt($request->nama_guru);
        $user->role = 'GURU';
        $user->save();
        return redirect()->route('guru.index')->withSuccessMessage('Berhasil Mengubah Data');
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
        $user = User::where('id', $guru->id_user)->first();
        $user->delete();
        return redirect()->route('guru.index')->withSuccessMessage('Berhasil Menghapus Data');
    }

    public function search(Request $request)
	{
        $search = $request->get('search');
        
        $guru = Guru::where('NIP', 'like', "%".$search."%")->
                orWhere('nama_guru', 'like', "%".$search."%")->paginate(5);
 
    	return view('admin/guru/tabelguru', compact('guru', 'search'));
    }

    public function searchguru(Request $request)
	{
        $search = $request->get('search');
        
        $guru = Guru::where('NIP', 'like', "%".$search."%")->
                orWhere('nama_guru', 'like', "%".$search."%")->paginate(5);
 
    	return view('guru/guru/tabelguru', compact('guru', 'search'));
    }

    public function pdf()
    {
        $gurus = Guru::all();

        $pdf = PDF::loadView('admin/guru/pdfguru', compact('gurus'));
        return $pdf->stream('pdfguru.pdf');
    }

    public function pdfguru()
    {
        $gurus = Guru::all();

        $pdf = PDF::loadView('guru/guru/pdfguru', compact('gurus'));
        return $pdf->stream('pdfguru.pdf');
    }

    public function export() 
    {
        return Excel::download(new GuruExport, 'guru.xlsx');
    }
}
