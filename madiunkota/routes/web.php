<?php

use App\Models\Berita;
use Illuminate\Support\Facades\Auth;
use UniSharp\LaravelFilemanager\Lfm;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IpkdController;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;

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
Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


Route::get('/', [HomeController::class, 'index']);

Route::get('informasi/{id}', [HomeController::class, 'show_detail_berita']);

Route::get('/file-download/{file}', [HomeController::class, 'download_file']);

Route::get('/informasi', [HomeController::class, 'show_informasi']);
Route::get('/kegiatan', [HomeController::class, 'show_kegiatan_pemkot']);
Route::get('/pengumuman', [HomeController::class, 'show_pengumuman']);
Route::get('/lowongan', [HomeController::class, 'show_lowongan']);

Route::get('/arsip/kegiatan_walikota', [HomeController::class, 'show_kegiatan_walikota']);
Route::get('/arsip/tabloid', [HomeController::class, 'show_tabloid']);
Route::get('/arsip/dokumen', [HomeController::class, 'show_dokumen']);
Route::get('/arsip/foto', [HomeController::class, 'show_foto']);
Route::get('/arsip/video', [HomeController::class, 'show_video']);
Route::get('/arsip/ipkd', [HomeController::class, 'show_ipkd']);
Route::get('/arsip/download_ipkd/{file}', [HomeController::class, 'download_ipkd']);


Route::get('/profil/sejarah', [HomeController::class, 'show_sejarah']);
Route::get('/profil/profil_pimpinan', [HomeController::class, 'show_profil_pimpinan']);
Route::get('/profil/visi_misi', [HomeController::class, 'show_visi_misi']);
Route::get('/profil/alamat', [HomeController::class, 'show_alamat']);
Route::get('/profil/wilayah', [HomeController::class, 'show_wilayah']);

Route::get('/statistik/data_penduduk_2019', [HomeController::class, 'show_data_penduduk_2019']);
Route::get('/berita', [HomeController::class, 'show_berita']);



//sisi ADMIN//
Route::get('/admin', [DashboardController::class, 'index'])->name('admin')->middleware('verified');




Route::get('/admin/user', [UserController::class, 'index']);
// Route::get('/admin/opd', [OpdController::class, 'index']);
Route::get('/admin/profil', [ProfilController::class, 'index']);

// Route::get('/admin/berita', [BeritaController::class, 'index']);

// Route::get('/admin/berita/tambah_baru', [ BeritaController::class, 'create' ]);
Route::post('/admin/berita/hapus_berita', [ BeritaController::class, 'hapus_berita' ])->middleware('auth');


Route::resource('/admin/berita', BeritaController::class)->middleware('auth');
Route::resource('/admin/opd', OpdController::class)->middleware('auth');
Route::resource('/admin/user', UserController::class)->middleware('auth');
Route::resource('/admin/ipkd', IpkdController::class)->middleware('auth');
Route::get('/admin/download_ipkd/{file}', [IpkdController::class, 'download_ipkd']);


Route::post('/admin/profil/update_sejarah', [ ProfilController::class, 'update_sejarah' ])->middleware('auth');
Route::post('/admin/profil/update_visi_misi', [ ProfilController::class, 'update_visi_misi' ])->middleware('auth');
Route::post('/admin/profil/update_profil_pimpinan', [ ProfilController::class, 'update_profil_pimpinan' ])->middleware('auth');
Route::post('/admin/profil/update_wilayah_geografis', [ ProfilController::class, 'update_wilayah_geografis' ])->middleware('auth');

// Route::post('/admin/berita', [BeritaController::class, 'upload_image'])->name('ckeditor.upload');;

Route::get('/jadwal', [HomeController::class, 'show_jadwal']);

// Route::get('/login2', function () {
//     return view('auth/login2', [
//         "title" => "Informasi",
//         "parent" => "berita"
//     ]);
// });



//MENU PROFIL




















