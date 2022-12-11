<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\TransaksiController;
use App\Models\Guru;
use App\Models\Siswa;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome', ['title' => 'Laravel']);
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);
    Route::resource('siswa', SiswaController::class);
    
    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::get('/adminDashboard', function () {
            return view('adminDashboard', [
                'title' => 'Admin Dashboard', 
                'count' => [Guru::all()->count(), Siswa::all()->count()],
            ]);
        })->name('adminDashboard');
        Route::resource('guru', GuruController::class);
        // Route::resource('siswa', SiswaController::class);

        Route::get('registerUser', [RegisterUserController::class, 'index'])->name('registerUser');
        Route::get('registerUser/guru', [RegisterUserController::class, 'guruForm'])->name('registerUserGuru');
        Route::get('registerUser/siswa', [RegisterUserController::class, 'siswaForm'])->name('registerUserSiswa');

        Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
        Route::get('/transaksi/setor/{id}', [TransaksiController::class, 'setor'])->name('setor');
        Route::post('/transaksi/setor/{id}', [TransaksiController::class, 'saveSetor'])->name('setor');
        Route::get('/transaksi/tarik/{id}', [TransaksiController::class, 'tarik'])->name('tarik');
        Route::post('/transaksi/tarik/{id}', [TransaksiController::class, 'saveTarik'])->name('tarik');
    });

    Route::group(['middleware' => 'checkRole:guru'], function() {
        Route::get('/guruDashboard', function () {
            return view('adminDashboard', [
                'title' => 'Guru Dashboard', 
                'count' => [Guru::all()->count(), Siswa::all()->count()],
            ]);
        })->name('guruDashboard');
    });

    Route::group(['middleware' => 'checkRole:siswa'], function() {
        Route::get('/siswaDashboard', function () {
            return view('siswaDashboard', ['title' => 'Siswa Dashboard']);   
        })->name('siswaDashboard');
        Route::get('/', function () {
            return view('welcome', ['title' => 'Laravel']);
        });
        Route::get('/tabungan', [TransaksiController::class, 'tabungan'])->name('tabungan');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
