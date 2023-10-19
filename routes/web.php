<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\Ibadah_Controller;
use App\Http\Controllers\Validasi_Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin_Controller;
use App\Http\Controllers\Pengumuman_Controller;
use App\Http\Controllers\Umat_Controller;
use App\Http\Controllers\Pendeta_Controller;
use App\Livewire\IbadahSyukur;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();
//HALAMAN UTAMA
Route::get('/',[Home_Controller::class, 'index']);
//HALAMAN DAFTAR IBADAH
Route::get('/ibadah',[Ibadah_Controller::class, 'index']);
Route::view('login','livewire.homeauth');
//HALAMAN VALIDASI
Route::get('/validasi',[Validasi_Controller::class, 'index']);
// Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Login Post
Route::post('/login',[LoginController::class,'Login'])->name('user.login');
//HALAMAN ADMIN
Route::get('/halamanadmin',[Admin_Controller::class, 'index'])->middleware(['auth', 'admin']);
Route::view('/halamanpengumuman','admin.pengumuman');
Route::get('/halamanpendeta',[Admin_Controller::class, 'indexpendeta']);
Route::get('/halamanlingkungan',[Admin_Controller::class, 'indexlingkungan']);
Route::get('/halamanpersembahan',[Admin_Controller::class, 'indexpersembahan']);
Route::get('/halamanumat',[Admin_Controller::class, 'indexumat']);
//HALAMAN PENGUMUMAN
Route::get('/pengumuman',[Pengumuman_Controller::class, 'index']);
//HALAMAN PENDETA
Route::get('/pendeta',[Pendeta_Controller::class, 'index']);
//HALAMAN PROFIL UMAT
Route::view('/profil','livewire.profil-page');
//IBADAH SYUKUR
Route::view('form-ibadah-syukur','livewire.umat');

