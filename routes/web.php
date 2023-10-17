<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\Ibadah_Controller;
use App\Http\Controllers\Validasi_Controller;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin_Controller;

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

//form ibadah syukur
Route::get('/form-ibadah-syukur', IbadahSyukur::class);