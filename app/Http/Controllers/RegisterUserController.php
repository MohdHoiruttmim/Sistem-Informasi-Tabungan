<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function index()
    {
        return view('admin.createLoginUser', 
        [
            'title' => 'Register User',
        ]);
    }

    public function guruForm()
    {
        return view('admin.createGuruLogin',[
            'title' => 'Register Guru',
        ]);
    }

    public function siswaForm()
    {
        return view('admin.createSiswaLogin',[
            'title' => 'Register Siswa',
        ]);
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);

    //     $user = new User;
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = $request->password;
    //     $user->save();

    //     return redirect()->route('login');
    // }
}
