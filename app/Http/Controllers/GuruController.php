<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Guru;
use App\Models\User;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        // return view('admin.tableGuru', [
        //     'title' => 'Data Guru', 
        //     'guru' => Guru::all(),
        // ]);
        // make pagination
        return view('admin.tableGuru', [
            'title' => 'Data Guru',
            'gurus' => Guru::paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createGuruLogin', ['title' => 'Tambah Data Guru']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nip' => 'required',
            'telp' => 'required',
            'address' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        // dd($user->id);
        $guru = new Guru;
        $guru->fullName = $request->fullName;
        $guru->nip = $request->nip;
        $guru->telp = $request->telp;
        $guru->address = $request->address;
        $guru->user_id = $user->id;
        $guru->save();

        return redirect('/guru')->with('status', 'Data Guru Berhasil Ditambahkan!');
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
    public function update(Request $request, Guru $guru)
    {
        $guru->update($request->all());
        return redirect('/guru')->with('status', 'Data Guru Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        Guru::destroy($guru->id);
        return redirect('/guru')->with('status', 'Data Guru Berhasil Dihapus!');
    }

}
