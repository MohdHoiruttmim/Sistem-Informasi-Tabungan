<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DbGuru;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function count()
    {
        $guru = DbGuru::all()->count();
        return $guru;
    }
    
    public function index()
    {
        return view('admin.tableGuru', [
            'title' => 'Data Guru', 
            'guru' => DbGuru::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createGuru', ['title' => 'Tambah Data Guru']);
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

        //show the data
        // dd($request->all());

        DbGuru::create($request->all());
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DbGuru $guru)
    {
        DbGuru::destroy($guru->id);
        return redirect('/guru')->with('status', 'Data Guru Berhasil Dihapus!');
    }

}
