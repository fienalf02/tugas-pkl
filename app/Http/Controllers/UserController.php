<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use App\User;

class userController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('admin/edituser', compact('user', 'id')); 
    }

    public function editguru()
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('guru/edituser', compact('user', 'id')); 
    }

    public function edittu()
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('TU/edituser', compact('user', 'id')); 
    }

    public function editsiswa()
    {
        $user = User::where('id', Auth::user()->id)->get();
        return view('siswa/edituser', compact('user', 'id')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('home', $request->id)->withSuccessMessage('Berhasil Mengubah Data');
    }
    


}
