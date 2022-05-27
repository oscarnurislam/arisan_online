<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SetoranController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\KocokController;


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

// -----------------------------------------------LOGIN AND REGISTER SECTION--------------------------------

Route::get('/', function () {
    return view('index');
})->name('awal');


Route::get('login', [UserAuthController::class, 'login'])->name('auth.login');

Route::get('register', [UserAuthController::class, 'register'])->name('auth.reg')->middleware('AlreadyLogged');

Route::post('create', [UserAuthController::class, 'create'])->name('auth.create');

Route::post('check', [UserAuthController::class, 'check'])->name('auth.check');

Route::get('welcome', [UserAuthController::class, 'welcome'])->middleware('isLoggedIn');

Route::get('logout', [UserAuthController::class, 'logout'])->name('auth.logout');


// ------------------------------------------END LOGIN AND REGISTER SECTION--------------------------------
// ------------------------------------------PROFILE SECTION----------------------------------------------

Route::get('profile', [UserProfileController::class, 'profile'])->name('admin.profile');

Route::put('update/{id}', [UserProfileController::class, 'update'])->name('profile.update');



// ------------------------------------------END PROFILE SECTION----------------------------------------------


// ----------------------------------------------PESERTA SECTION----------------------------------------

Route::resource('peserta', PesertaController::class);

// ----------------------------------------------END PESERTA SECTION----------------------------------------

// -----------------------------------------------SETORAN SECTION-------------------------------------------

Route::resource('setoran', SetoranController::class);

// -----------------------------------------------END SETORAN SECTION-------------------------------------------

// ------------------------------------------STATUS SECTION---------------------------------------------
Route::resource('status', StatusController::class);
// ------------------------------------------END STATUS SECTION---------------------------------------------

// --------------------------------------------KOCOK SECTION-----------------------------------------------
Route::get('kocok', [KocokController::class, 'kocok'])->name('kocok');

Route::get('hasil', [KocokController::class, 'hasil'])->name('hasil');

Route::get('clear', [KocokController::class, 'delete'])->name('delete');
// --------------------------------------------END KOCOK SECTION-----------------------------------------------

