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
        "harih"=>"03/21/2023 17:00:00",
        "tempatwaktu"=>"Sabtu, 21 Maret 2023",
        "tempat"=>"Rumah Makan Suronatan",
        "alamat_h"=>"Jl. Kenanga Raya No.9, RT.001/RW.006A, Jakasampurna,",
        "kec_h"=>"Kec. Jiwan Kab. Madiun Jawa Timur",
        "google_maps"=>"https://maps.google.com/maps?ll=-6.246855,106.971346&z=16&t=m&hl=en&gl=ID&mapclient=embed&daddr=RM.%20Pondok%20Kenanga%20Jl.%20Kenanga%20Raya%20No.9%20RT.001%2FRW.006A%2C%20Jakasampurna%20Bekasi%20Barat%2C%20Bekasi%20City%2C%20West%20Java%2017145@-6.2468549,106.9713456",
        "kota"=>"Kabupaten Madiun",
        "hari"=>"Sabtu",
        "tanggal"=>"21",
        "bulan"=>"Maret",
        "tahun"=>"2023",
        "jam"=>"20:00"
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
