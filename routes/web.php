<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

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



Route::middleware(['auth'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::middleware(['admin'])->group(function(){
        Route::get('/pembelian', [PembelianController::class, 'index'])->name('pembelian.index');
        Route::get('/pembelian/create',[PembelianController::class,'create'])->name('pembelian.create');
        Route::post('/pembelian', [PembelianController::class,'store'])->name('pembelian.store');
        Route::get('/pembelian/rekap', [PembelianController::class, 'rekap'])->name('pembelian.rekap');
        Route::get('/pembelian/download', [PembelianController::class, 'download'])->name('pembelian.download');


        Route::get('/user', [UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/user', [UserController::class, 'store'])->name('user.register');
        Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.delete');
        Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
        Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
        Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
        Route::delete('/barang/{barang}', [BarangController::class, 'destroy'])->name('barang.delete');
        Route::get('/api/barang/{kode}', [BarangController::class, 'getByKode']);
        Route::post('barang/import', [BarangController::class, 'import'])->name('barang.import');
    });
   
    
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
