<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataBukuController;


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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');


Route::get('/admin/databuku', [DataBukuController::class, 'index'])->name('admin.databuku')->middleware('is_admin');
Route::get('/admin/tambah/databuku', [DataBukuController::class, 'create'])->name('admin.tambah.databuku')->middleware('is_admin');
Route::post('/admin/databuku/post', [DataBukuController::class, 'store'])->name('post-databuku')->middleware('is_admin');
Route::get('/admin/databuku/delete/{id}', [DataBukuController::class, 'destroy'])->name('destroy-databuku');
Route::get('/admin/edit/databuku/{id}', [DataBukuController::class, 'edit']);
Route::put('/admin/update/databuku/{id}', [DataBukuController::class, 'update'])->name('update-databuku');


Route::get('/dashboard', [App\Http\controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/siswa', [App\Http\controllers\SiswaController::class, 'index'])->name('siswa');

Route::get('/beranda', [App\Http\controllers\BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [App\Http\controllers\TentangController::class, 'index'])->name('tentang');
Route::get('/katalogbuku', [App\Http\controllers\KatalogBukuController::class, 'index'])->name('katalogbuku');
Route::get('/sirkulasi', [App\Http\controllers\SirkulasiController::class, 'index'])->name('sirkulas');
Route::get('/profile', [App\Http\controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/peminjamanbuku', [App\Http\controllers\PeminjamanBukuController::class, 'index'])->name('peminjamanbuku');
Route::get('/pengembalianbuku', [App\Http\controllers\PengembalianBukuController::class, 'index'])->name('pengembalianbuku');
