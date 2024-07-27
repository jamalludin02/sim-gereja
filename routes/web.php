<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LingkunganController;
use App\Http\Controllers\BaptisController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\IbadahController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JadwalHalanganController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PernikahanController;
use App\Http\Controllers\PersetujuanController;
use App\Http\Controllers\SidiController;
use App\Http\Controllers\UserController;
use App\Models\IbadahSyukur;
use App\Models\JadwalHalangan;
use App\Models\Lingkungan;
use App\Models\Pengumuman;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::get('/pengumuman', [HomeController::class, 'pengumuman'])->name('pengumuman');
Route::get('/pengumuman/details/{id}', [HomeController::class, 'pengumumanDetails'])->name('pengumuman-details');
Route::get('api/get-jadwal', [HomeController::class, 'getJadwal'])->name('api.get-lingkungan');


// Route::get('/home', [HomeController::class, 'index'])->name('home');
Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' =>  'role:ADMIN', 'prefix' => 'admin'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Lingkungan
        Route::resource('lingkungan', LingkunganController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

        Route::resource('user', UserController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::get('user/{id}/reset-password', [UserController::class, 'resetPassword'])->name('user.reset-password');

        Route::resource('ibadah-syukur', IbadahController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
        Route::post('ibadah-syukur/store-penolakan/{id}', [IbadahController::class, 'storePenolakan'])->name('store-penolakan.admin');

        Route::resource('sidi', SidiController::class)
            ->only(['index', 'edit', 'update', 'destroy']);

        Route::resource('baptis-anak', BaptisController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

        Route::resource('pernikahan', PernikahanController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

        Route::resource('pengumuman', PengumumanController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    });


    Route::group(['middleware' =>  'role:UMAT', 'prefix' => 'umat'], function () {
        Route::get('/', [DashboardController::class, 'indexUmat'])->name('umat.dashboard');

        // IabadahSyukur
        Route::resource('ibadah-syukur', IbadahController::class)
            ->only([
                'create', 'store'
            ]);
        Route::get('ibadah-syukur', [IbadahController::class, 'showByUmat'])->name('Ibadah.umat');
        Route::get('ibadah-syukur-print/{id}', [IbadahController::class, 'print'])->name('ibadah-print.umat');

        // sidi
        Route::resource('sidi', SidiController::class)
            ->only([
                'create', 'store'
            ]);
        Route::get('sidi', [SidiController::class, 'indexUmat'])->name('sidi.umat');
        Route::get('sidi-print', [SidiController::class, 'print'])->name('sidi-print.umat');

        // baptis anak
        Route::resource('baptis-anak', BaptisController::class)
            ->only([
                'create', 'store',
            ]);
        Route::get('baptis-anak', [BaptisController::class, 'indexUmat'])->name('baptis-anak.umat');
        Route::get('baptis-anak-print/{id}', [BaptisController::class, 'print'])->name('baptis-anak-print.umat');


        // baptis anak
        Route::resource('pernikahan', PernikahanController::class)
            ->only([
                'create', 'store',
            ]);
        Route::get('pernikahan', [PernikahanController::class, 'indexUmat'])->name('pernikahan.umat');
        Route::get('pernikahan-print', [PernikahanController::class, 'print'])->name('pernikahan-print.umat');

        // Akun User
        Route::get('akun', [UserController::class, 'indexUmat'])->name('akun.umat');
        Route::post('akun/update', [UserController::class, 'updateAkunByUmat'])->name('akun.update.umat');
    });


    Route::group(['middleware' =>  'role:PENDETA', 'prefix' => 'pendeta'], function () {
        Route::get('/', [DashboardController::class, 'indexPendeta'])->name('pendeta.dashboard');


        Route::get('jadwal-acara', [JadwalController::class, 'indexPendeta']);


        Route::get('jadwal-halangan', [JadwalHalanganController::class, 'indexPendeta'])->name('jadwal-halangan.pendeta');
        Route::post('jadwal-halangan/store', [JadwalHalanganController::class, 'store'])->name('jadwal-halangan.store.pendeta');
        // Route::get('persetujuan-ibadah-syukur', [IbadahController::class, 'indexPendeta'])->name('persetujuan.pendeta');
        // Route::get('form-penolakan/{id}', [IbadahController::class, 'formPenolakan'])->name('form-penolaka.pendeta');



        Route::get('akun', [UserController::class, 'indexPendeta'])->name('akun.pendeta');
        Route::post('akun/update', [UserController::class, 'updateAkunByPendeta'])->name('akun.update.pendeta');
    });
});
