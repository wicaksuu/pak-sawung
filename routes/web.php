<?php

use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return view('index',[
        "harih"=>"04/24/2023 09:00:00",
        "tempatwaktu"=>"Senin, 24 April 2023",
        "tempat"=>"Gedung Aula SMPN 1 Magetan",
        "alamat_h"=>"Jl. Kartini No.4, Dusun Magetan, Magetan,",
        "kec_h"=>"Kec. Magetan, Kabupaten Magetan, Jawa Timur 63361",
        "google_maps"=>"https://www.google.com/maps/dir//SMP+Negeri+1+Magetan,+Jl.+Kartini+No.4,+Dusun+Magetan,+Magetan,+Kec.+Magetan,+Kabupaten+Magetan,+Jawa+Timur+63361/@-7.6580791,111.3285989,15z/data=!4m8!4m7!1m0!1m5!1m1!1s0x2e79922c598ba157:0xb62e3a2d63a442b3!2m2!1d111.3285989!2d-7.6580791",
        "kota"=>"Kabupaten Madiun",
        "hari"=>"Senin",
        "tanggal"=>"24",
        "bulan"=>"April",
        "tahun"=>"2023",
        "jam"=>"09:00"
    ]);
})->name('base');

Route::get('/reservasi', [PesertaController::class, 'action'])->name('action');

Route::get('/user', [PesertaController::class, 'dashboard'])->name('users');
// alamat
Route::get('/cari', [PesertaController::class, 'getUser'])->name('get-user');
Route::get('/user/{id}', [PesertaController::class, 'user'])->name('user');
Route::get('/provinsi', [PesertaController::class, 'provinsi'])->name('provinsi');
Route::get('/kelas', [PesertaController::class, 'kelas'])->name('kelas');
Route::get('/kaos', [PesertaController::class, 'kaos'])->name('kaos');
Route::get('/kota/{id}', [PesertaController::class, 'kota'])->name('kota');
Route::get('/kec/{id}', [PesertaController::class, 'kec'])->name('kec');
Route::get('/des/{id}', [PesertaController::class, 'des'])->name('des');
Route::post('alamat', [PesertaController::class, 'alamat'])->name('save-alamat');
Route::post('update', [PesertaController::class, 'update'])->name('update');
Route::get('update-dashboard', [PesertaController::class, 'updateDashboard'])->name('update-dashboard');
Route::get('keluar', [PesertaController::class, 'keluar'])->name('keluar');



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
