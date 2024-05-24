<?php

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCOntroller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PemimpinController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PermintaanCOntroller;

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

Route::get('/', function () {
    return view('index', [
        'title'=> 'Home'
    ]);
})->name('home');

Route::get('/login', [LoginController::class,'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class,'authenticate']);
Route::post('/logout', [LoginController::class,'logout']);

Route::get('/register', [RegisterController::class,'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class,'store'])->name('register');

// MIDDLEWARE
// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin', [AdminController::class, 'index']);
// });

// Route::middleware(['auth', 'role:admin,pemimpin'])->group(function () {
//     Route::get('/pemimpin', [PemimpinController::class, 'index']);
// });

// Route::middleware(['auth', 'role:admin,pemimpin,karyawan'])->group(function () {
//     Route::get('/karyawan', [KaryawanController::class, 'index']);
// });

// Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/', [InventarisController::class, 'index'])->name('admin');
    //Menu Inventaris
    Route::prefix('inventaris')->group(function () {
        Route::get('/', [InventarisController::class, 'showInventaris'])->name('inventaris');
        Route::post('/store', [InventarisController::class, 'store'])->name('inventaris.store');
        Route::delete('/delete/{inventaris}', [InventarisController::class, 'destroy'])->name('inventaris.delete');
        Route::put('/edit/{inventaris}', [InventarisController::class, 'update'])->name('inventaris.update');
        Route::get('/laporan', [InventarisController::class, 'generateLaporan'])->name('inventaris.laporan');
    });

    //Menu Permintaan
    Route::prefix('permintaan')->group(function (){
        Route::get('/', [PermintaanController::class, 'index'])->name('permintaan');
        Route::post('/store', [PermintaanController::class, 'store'])->name('permintaan.store');
        Route::put('/edit{permintaan}', [PermintaanController::class, 'update'])->name('permintaan.edit');
        Route::delete('/delete{permintaan}', [PermintaanController::class, 'destroy'])->name('permintaan.delete');
        Route::get('/laporan', [PermintaanController::class, 'generateLaporan'])->name('permintaan.laporan');
    });

    //Menu User
    Route::prefix('user')->group(function (){
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::put('/edit{user}', [UserController::class, 'update'])->name('user.edit');
        Route::delete('/delete{user}', [UserController::class, 'destroy'])->name('user.delete');
        Route::get('/laporan', [UserController::class, 'generateLaporan'])->name('user.laporan');
    });

});
