<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home_Controller;
use App\Http\Controllers\Ibadah_Controller;
use App\Http\Controllers\Validasi_Controller;

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

Route::get('/', function () {
    return view('welcome');
});

//HALAMAN UTAMA
Route::get('/halamanutama',[Home_Controller::class, 'index']);

//HALAMAN DAFTAR IBADAH
Route::get('/ibadah',[Ibadah_Controller::class, 'index']);

//HALAMAN VALIDASI
Route::get('/validasi',[Validasi_Controller::class, 'index']);