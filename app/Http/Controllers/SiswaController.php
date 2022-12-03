<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Siswa;
use App\Models\User;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tableSiswa', [
            'title' => 'Data Siswa',
            'siswa' => Siswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        // dd($user->id);
        $siswa = new Siswa;
        $siswa->fullName = $request->fullName;
        $siswa->nis = $request->nis;
        $siswa->telp_orngtua = $request->telp_orngtua;
        $siswa->address = $request->address;
        $siswa->grade = $request->grade;
        $siswa->user_id = $user->id;
        $siswa->save();

        return redirect('/siswa')->with('status', 'Data siswa Berhasil Ditambahkan!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $siswa->update($request->all());
        return redirect('/siswa')->with('status', 'Data siswa berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect('/siswa')->with('status', 'Data siswa berhasil dihapus!');
    }
}
