<?php

use App\Http\Controllers\PerpusController;

Route::get('/daftar', [PerpusController::class, 'index'])->name('daftar');
Route::post('/anggota', [PerpusController::class, 'storeAnggota']);
Route::post('/buku', [PerpusController::class, 'storeBuku']);
Route::post('/detailpinjam', [PerpusController::class, 'storePinjam']);

Route::get('/', function () {
    return view('home');
});