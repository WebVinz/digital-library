<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BukuController,
    UserController,
    TransaksiController,
    PeminjamanController,
    PengembalianController
};
use App\Http\Controllers\HomeController;


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/
Auth::routes();

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // BUKU
    Route::resource('buku', BukuController::class);

    // USER
    Route::resource('user', UserController::class);

    // TRANSAKSI
    Route::resource('transaksi', TransaksiController::class)->except(['show']);

    Route::get('/admin/transaksi/approval', [TransaksiController::class, 'approval'])
    ->name('transaksi.approval');

    Route::post('/admin/transaksi/{id}/setujui', [TransaksiController::class, 'setujui'])
        ->name('transaksi.setujui');
});


/*
|--------------------------------------------------------------------------
| SISWA
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // PEMINJAMAN
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])
        ->name('peminjaman.index');

    Route::post('/peminjaman', [PeminjamanController::class, 'store'])
        ->name('peminjaman.store');

    // PENGEMBALIAN
    Route::get('/pengembalian', [PengembalianController::class, 'index'])
        ->name('pengembalian.index');

    Route::post('/pengembalian', [PengembalianController::class, 'store'])
    ->name('pengembalian.store');

});

Route::get('/home', function () {
    if (auth()->user()->role === 'admin') {
        return app(\App\Http\Controllers\HomeController::class)->admin();
    }
    return app(\App\Http\Controllers\HomeController::class)->siswa();
})->middleware('auth')->name('home');

Route::get('/', function () {

    // kalau belum login, tampilkan halaman landing
    return view('welcome');
});