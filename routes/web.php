<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;

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

    Route::group(['middleware' => 'checkRole:admin'], function() {
        Route::get('/adminDashboard', function () {
            return view('adminDashboard', ['title' => 'Admin Dashboard']);
        })->name('adminDashboard');
    });
    Route::group(['middleware' => 'checkRole:guru'], function() {
        Route::get('/guruDashboard', function () {
            return view('guruDashboard', ['title' => 'Guru Dashboard']);
        })->name('guruDashboard');
    });
    Route::group(['middleware' => 'checkRole:user'], function() {
        Route::get('/siswaDashboard', function () {
            return view('siswaDashboard', ['title' => 'Siswa Dashboard']);   
        })->name('siswaDashboard');
        Route::get('/', function () {
            return view('welcome', ['title' => 'Laravel']);
        });
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
