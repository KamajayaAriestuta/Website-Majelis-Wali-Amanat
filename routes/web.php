<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// USER CONTROLLERS
use App\Http\Controllers\User\DashboardController;

//ADMIN CONTROLLERS
use App\Http\Controllers\Admin\Dashboard as DashboardAdminController;
use App\Http\Controllers\Admin\AnggotaMWA;
use App\Http\Controllers\Admin\AnggotaKA;
use App\Http\Controllers\Admin\Kegiatan;
use App\Http\Controllers\Admin\Keputusan;
use App\Http\Controllers\Admin\Peraturan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|-------------------------------------------------------------------------- 
*/  


Route::get('/', [DashboardController::class, 'index'])->name('user.dashboard');
Route::get('/about', [DashboardController::class, 'about'])->name('user.about');
Route::get('/anggota_mwa', [DashboardController::class, 'mwateam'])->name('user.mwateam');
Route::get('/anggota_ka', [DashboardController::class, 'kateam'])->name('user.kateam');
Route::get('/kegiatan', [DashboardController::class, 'kegiatan'])->name('user.kegiatan');
Route::get('/kegiatan/{id}', [DashboardController::class, 'show_kegiatan'])->name('user.kegiatan.detail');
Route::get('/keputusan', [DashboardController::class, 'keputusan'])->name('user.keputusan');
Route::get('/peraturan', [DashboardController::class, 'peraturan'])->name('user.peraturan');
Route::get('/kontak', [DashboardController::class, 'kontak'])->name('user.kontak');




Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    // Dashboard Admin
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    // Profil Admin (opsional kalau berbeda dari user)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

    // Anggota MWA
    Route::get('/anggotaMWA', [AnggotaMWA::class, 'index'])->name('admin.anggotaMWA');
    Route::get('/anggotaMWA/create', [AnggotaMWA::class, 'create'])->name('admin.anggotaMWA.create');
    Route::post('/anggotaMWA/store', [AnggotaMWA::class, 'store'])->name('admin.anggotaMWA.store');
    Route::get('/anggotaMWA/{id}', [AnggotaMWA::class, 'show'])->name('admin.anggotaMWA.show');
    Route::get('/anggotaMWA/{id}/edit', [AnggotaMWA::class, 'edit'])->name('admin.anggotaMWA.edit');
    Route::put('/anggotaMWA/{id}', [AnggotaMWA::class, 'update'])->name('admin.anggotaMWA.update');
    Route::delete('/anggotaMWA/{id}', [AnggotaMWA::class, 'destroy'])->name('admin.anggotaMWA.destroy');

    // Anggota KA
    Route::get('/anggotaKA', [AnggotaKA::class, 'index'])->name('admin.anggotaKA');
    Route::get('/anggotaKA/create', [AnggotaKA::class, 'create'])->name('admin.anggotaKA.create');
    Route::post('/anggotaKA/store', [AnggotaKA::class, 'store'])->name('admin.anggotaKA.store');
    Route::get('/anggotaKA/{id}', [AnggotaKA::class, 'show'])->name('admin.anggotaKA.show');
    Route::get('/anggotaKA/{id}/edit', [AnggotaKA::class, 'edit'])->name('admin.anggotaKA.edit');
    Route::put('/anggotaKA/{id}', [AnggotaKA::class, 'update'])->name('admin.anggotaKA.update');
    Route::delete('/anggotaKA/{id}', [AnggotaKA::class, 'destroy'])->name('admin.anggotaKA.destroy');

    // Kegiatan
    Route::get('/kegiatan', [Kegiatan::class, 'index'])->name('admin.kegiatan.show');
    Route::get('/kegiatan/create', [Kegiatan::class, 'create'])->name('admin.kegiatan.create');
    Route::post('/kegiatan/store', [Kegiatan::class, 'store'])->name('admin.kegiatan.store');
    Route::get('/kegiatan/{id}/edit', [Kegiatan::class, 'edit'])->name('admin.kegiatan.edit');
    Route::put('/kegiatan/{id}', [Kegiatan::class, 'update'])->name('admin.kegiatan.update');
    Route::delete('/kegiatan/{id}', [Kegiatan::class, 'destroy'])->name('admin.kegiatan.destroy');

    // Keputusan
    Route::get('/keputusan', [Keputusan::class, 'index'])->name('admin.keputusan.show');
    Route::get('/keputusan/create', [Keputusan::class, 'create'])->name('admin.keputusan.create');
    Route::post('/keputusan/store', [Keputusan::class, 'store'])->name('admin.keputusan.store');
    Route::get('/keputusan/{id}/edit', [Keputusan::class, 'edit'])->name('admin.keputusan.edit');
    Route::put('/keputusan/{id}', [Keputusan::class, 'update'])->name('admin.keputusan.update');
    Route::delete('/keputusan/{id}', [Keputusan::class, 'destroy'])->name('admin.keputusan.destroy');

    // Peraturan
    Route::get('/peraturan', [Peraturan::class, 'index'])->name('admin.peraturan.show');
    Route::get('/peraturan/create', [Peraturan::class, 'create'])->name('admin.peraturan.create');
    Route::post('/peraturan/store', [Peraturan::class, 'store'])->name('admin.peraturan.store');
    Route::get('/peraturan/{id}/edit', [Peraturan::class, 'edit'])->name('admin.peraturan.edit');
    Route::put('/peraturan/{id}', [Peraturan::class, 'update'])->name('admin.peraturan.update');
    Route::delete('/peraturan/{id}', [Peraturan::class, 'destroy'])->name('admin.peraturan.destroy');
});









require __DIR__.'/auth.php';
