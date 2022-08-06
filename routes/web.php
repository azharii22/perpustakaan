<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\DashboardController;

use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\Admin\PerpanjanganController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\DataBukuController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\RakController;

use App\Http\Controllers\CreatePeminjamanController;
use App\Http\Controllers\StorePeminjamanController;


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

Route::get('/', function () {
    return view('siswa.beranda.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::prefix('admin')->as('admin.')->middleware('is_admin')->group(function () {
    //
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    //
    Route::resources([
        'data-pengembalian'     => PengembalianController::class,
        'data-perpanjangan'     => PerpanjanganController::class,
    ], [
		'only' => ['index', 'edit', 'update']
	]);

    Route::resources([
        'data-peminjaman'       => PeminjamanController::class,
        'data-pengembalian'     => PengembalianController::class,
        'data-perpanjangan'     => PerpanjanganController::class,
        //
        'data-anggota'  => AnggotaController::class,
        //
        'data-buku'     => DataBukuController::class,
        'data-kategori' => KategoriController::class,
        'data-rak'      => RakController::class,
    ]);
});


Route::get('/siswa', [App\Http\controllers\SiswaController::class, 'index'])->name('siswa');

Route::resource('katalogbuku', App\Http\Controllers\KatalogBukuController::class);

Route::get('/buat-peminjaman/{id}', CreatePeminjamanController::class)->name('create-peminjaman');
Route::post('/buat-peminjaman', StorePeminjamanController::class)->name('store-peminjaman');

Route::get('/beranda', [App\Http\controllers\BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [App\Http\controllers\TentangController::class, 'index'])->name('tentang');
// Route::get('/katalogbuku', [App\Http\controllers\KatalogBukuController::class, 'index'])->name('katalogbuku');
Route::get('/sirkulasi', [App\Http\controllers\SirkulasiController::class, 'index'])->name('sirkulas');
Route::get('/profile', [App\Http\controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/peminjamanbuku', [App\Http\controllers\PeminjamanBukuController::class, 'index'])->name('peminjamanbuku');
Route::get('/pengembalianbuku', [App\Http\controllers\PengembalianBukuController::class, 'index'])->name('pengembalianbuku');
