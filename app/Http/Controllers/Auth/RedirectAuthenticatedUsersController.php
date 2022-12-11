<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'admin') {
            return redirect('/adminDashboard');
        }
        elseif(auth()->user()->role == 'guru'){
            return redirect('/guruDashboard');
        }
        elseif(auth()->user()->role == 'siswa'){
            return redirect('/siswaDashboard');
        }
        else{
            return auth()->logout();
        }
    }
}
