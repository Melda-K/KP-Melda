<?php

use App\Http\Controllers\NonAkademikController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\WaliKelasController;
use App\Models\WaliKelas;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/waliKelas', [WaliKelasController::class, 'index'])->name('walikelas.index');
    Route::get('/waliKelas/create', [WaliKelasController::class, 'create'])->name('walikelas.create');
    Route::post('/waliKelas', [WaliKelasController::class, 'store'])->name('walikelas.store');
    // Route::get('/waliKelas/{id}/edit', [WaliKelasController::class, 'edit'])->name('walikelas.edit');
    // Route::match(['put', 'patch'], '/walikelas/{id}', [WaliKelasController::class, 'update'])->name('walikelas.update');
    // Route::delete('/waliKelas/{id}', [WaliKelasController::class, 'destroy'])->name('walikelas.destroy');

    route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');

    route::get('/nonakademik', [NonAkademikController::class, 'index'])->name('nonakademik.index');
    route::get('/nonakademik/create', [NonAkademikController::class, 'create'])->name('nonakademik.create');
});


require __DIR__.'/auth.php';