<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CekGratisController;
use App\Http\Controllers\HomeShowController;


Route::get('/', [HomeShowController::class, 'ProductShow'])->name('home');

Route::get('/cekgratis', function () {
    return view('Cek_Gratis');
});

Route::get('/dashboard_barang', function () {
    return view('administrator.dashboard_barang');
});
Route::get('/dashboard_cekgratis', function () {
    return view('administrator.dashboard_cek_gratis');
});

Route::get('/dashboard_paket', function () {
    return view('administrator.dashboard_paket');
});



Route::get('/adminlogout', function () {
    return view('Home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/cekgratis', [CekGratisController::class, 'store'])->name('cekgratis.store');


require __DIR__.'/auth.php';