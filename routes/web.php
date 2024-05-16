<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\Ibadah_Controller;
use App\Http\Controllers\Validasi_Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin_Controller;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Pengumuman_Controller;
use App\Http\Controllers\Persembahan_Controller;
use App\Http\Controllers\Umat_Controller;
use App\Http\Controllers\Pendeta_Controller;
use App\Http\Controllers\Lingkungan_Controller;
use App\Http\Controllers\Katekisasi_Controller;
use App\Http\Controllers\Baptis_Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Nikah_Controller;
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


// GUEST
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/umat', [HomeController::class, 'indexumat']);


// ADMIN
Route::group(['prefix'=>'admin'], function () {
    Route::get('/dashboard', [Admin_Controller::class, 'index']);

    Route::view('/admin', 'admin.index');
    Route::view('/dashboard', 'admin.dashboard');
    Route::view('/pengumuman', 'admin.pengumuman');
    Route::view('/pendeta', 'admin.pendeta');
    Route::view('/lingkungan', 'admin.lingkungan');
    Route::view('/katekisasi', 'admin.katekisasi');
    Route::view('/baptis', 'admin.baptis');
    Route::view('/berkatnikah', 'admin.nikah');
    Route::get('/persembahan', [Admin_Controller::class, 'indexpersembahan']);
    Route::get('/umat', [Admin_Controller::class, 'indexumat']);
});


Route::get('/umat',[HomeController::class, 'indexumat']);
Route::get('/api/getId/{id}', [HomeController::class, 'searchId']);
//Route::get('/umat',[Home_Controller::class, 'indexumat']);
//HALAMAN DAFTAR IBADAH
Route::get('/ibadah',[Ibadah_Controller::class, 'index']);
Route::view('login','livewire.homeauth');
//HALAMAN VALIDASI
Route::get('/validasi',[Validasi_Controller::class, 'index']);
// Auth::routes();

// Register Post
Route::post('/register',[RegisterController::class,'create'])->name('user.login');
//Login Post
Route::post('/login',[LoginController::class,'Login'])->name('user.login');
Route::post('logout',[LoginController::class,'logout'])->name('logout');



//HALAMAN ADMIN
// Route::view('/admin','admin.index')->middleware(['auth', 'admin']);




//HALAMAN PENGUMUMAN
Route::get('/pengumuman',[Pengumuman_Controller::class, 'index']);
//HALAMAN PERSEMBAHAN
Route::get('/persembahan',[Persembahan_Controller::class, 'index']);
//HALAMAN PENDETA
Route::get('/jadwal',[Pendeta_Controller::class, 'index']);
//HALAMAN PROFIL UMAT
Route::view('/profil','livewire.profil-page');
//HALAMAN KETUA LINGKUNGAN
Route::view('/ketualingkungan','lingkungan.index')->middleware(['auth', 'ketling']);
//IBADAH SYUKUR
Route::view('form-ibadah-syukur','livewire.umat');
Route::get('/getpendeta/{tanggal}/{pendeta_id}', [Umat_Controller::class, 'getPendeta']);
//KATEKISASI
Route::get('/katekisasi',[Katekisasi_Controller::class, 'index']);
//BAPTIS
Route::get('/baptis',[Baptis_Controller::class, 'index']);
//NIKAH
Route::get('/nikah',[Nikah_Controller::class, 'index']);