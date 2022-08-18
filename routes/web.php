<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PengembalianController;
use App\Http\Controllers\Admin\PerpanjanganController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\DataBukuController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\RakController;
use App\Http\Controllers\Admin\ResetPasswordController as ResetPasswordByAdminController;
use App\Http\Controllers\Admin\ImportDataAnggotaController;
use App\Http\Controllers\Admin\UpdateKelasController;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\SirkulasiController;
use App\Http\Controllers\UpdateProfileController;
use App\Http\Controllers\UpdatePasswordController;
use App\Http\Controllers\CreatePeminjamanController;
use App\Http\Controllers\StorePeminjamanController;
use App\Http\Controllers\ResetPasswordController;

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

Auth::routes();

Route::get('/', [PagesController::class, 'beranda'])->name('beranda');
Route::get('/beranda', [PagesController::class, 'beranda'])->name('beranda');
Route::get('/tentang', [PagesController::class, 'tentang'])->name('tentang');
Route::get('/katalogbuku', [PagesController::class, 'katalog'])->name('katalogbuku.index');
Route::get('/katalogbuku/{id}', [PagesController::class, 'katalogShow'])->name('katalogbuku.show');
Route::get('/reset-password', [PagesController::class, 'resetPassword'])->name('reset-password');
Route::post('/reset-password/post', ResetPasswordController::class)->name('reset-password-post');

Route::middleware('auth')->group(function () {
    Route::get('/buat-peminjaman/{id}', CreatePeminjamanController::class)->name('create-peminjaman');
    Route::post('/buat-peminjaman', StorePeminjamanController::class)->name('store-peminjaman');
    Route::get('/peminjaman-buku', [SirkulasiController::class, 'peminjaman'])->name('peminjaman-buku');
    Route::get('/pengembalian-buku', [SirkulasiController::class, 'pengembalian'])->name('pengembalian-buku');
    Route::get('/profile', [PagesController::class, 'profile'])->name('profile');
    Route::post('/profile/update', UpdateProfileController::class)->name('profile-update');
    Route::get('/profile/password', [PagesController::class, 'ubahPassword'])->name('ubah-password');
    Route::post('/profile/password/update', UpdatePasswordController::class)->name('password-update');
});

Route::prefix('admin')->as('admin.')->middleware('is_admin')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::get('profile', ProfileController::class)->name('profile');
    Route::resources([
        'data-pengembalian'     => PengembalianController::class,
        'data-perpanjangan'     => PerpanjanganController::class,
    ], ['only' => ['index', 'edit', 'update']]);

    Route::resources([
        'data-peminjaman'       => PeminjamanController::class,
        'data-pengembalian'     => PengembalianController::class,
        'data-perpanjangan'     => PerpanjanganController::class,
        'data-anggota'          => AnggotaController::class,
        'data-buku'             => DataBukuController::class,
        'data-kategori'         => KategoriController::class,
        'data-rak'              => RakController::class,
        'reset-password'        => ResetPasswordByAdminController::class,
    ]);
    Route::post('/import-data-anggota', ImportDataAnggotaController::class)->name('import-data-anggota');
    Route::get('/update-kelas', UpdateKelasController::class)->name('update-kelas');
});