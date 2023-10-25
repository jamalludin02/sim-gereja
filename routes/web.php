<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\Ibadah_Controller;
use App\Http\Controllers\Validasi_Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin_Controller;
use App\Http\Controllers\Pengumuman_Controller;
use App\Http\Controllers\Persembahan_Controller;
use App\Http\Controllers\Umat_Controller;
use App\Http\Controllers\Pendeta_Controller;
use App\Http\Controllers\Lingkungan_Controller;
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
// Auth::routes();
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
Route::post('logout',[LoginController::class,'logout'])->name('logout');
//HALAMAN ADMIN
Route::get('/halamanadmin',[Admin_Controller::class, 'index'])->middleware(['auth', 'admin']);
Route::view('/halamanpengumuman','admin.pengumuman');
Route::view('/halamanpendeta','admin.pendeta');
Route::view('/halamanlingkungan','admin.lingkungan');
Route::get('/halamanpersembahan',[Admin_Controller::class, 'indexpersembahan']);
Route::get('/halamanumat',[Admin_Controller::class, 'indexumat']);
//HALAMAN PENGUMUMAN
Route::get('/pengumuman',[Pengumuman_Controller::class, 'index']);
//HALAMAN PERSEMBAHAN
Route::get('/persembahan',[Persembahan_Controller::class, 'index']);
//HALAMAN PENDETA
Route::get('/jadwal',[Pendeta_Controller::class, 'index']);
//HALAMAN PROFIL UMAT
Route::view('/profil','livewire.profil-page');
//HALAMAN KETUA LINGKUNGAN
Route::view('/halamanketualingkungan','lingkungan.index')->middleware(['auth', 'ketling']);
//IBADAH SYUKUR
Route::view('form-ibadah-syukur','livewire.umat');
Route::get('/getpendeta/{tanggal}/{pendeta_id}', [Umat_Controller::class, 'getPendeta']);

