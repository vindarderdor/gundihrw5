<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'welcome'])->name('public.welcome');

Route::get('/umkm', [PublicController::class, 'index'])->name('public.umkm.index');
Route::get('/umkm/{id}', [PublicController::class, 'show'])->name('public.umkm.show');
Route::get('/tentang', [PublicController::class, 'about'])->name('public.about');
Route::get('/tim-kkn', [PublicController::class, 'kknProfile'])->name('public.kkn');
Route::get('/kontak', [PublicController::class, 'contact'])->name('public.contact');
Route::post('/kontak', [PublicController::class, 'submitContact'])->name('public.contact.submit');

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('categories', CategoryController::class);
    Route::resource('umkms', UmkmController::class);
    Route::resource('messages', MessageController::class)->only(['index', 'show', 'destroy']);
    Route::get('/profile-kelurahan', [\App\Http\Controllers\Admin\KelurahanProfileController::class, 'edit'])->name('profile-kelurahan.edit');
    Route::put('/profile-kelurahan', [\App\Http\Controllers\Admin\KelurahanProfileController::class, 'update'])->name('profile-kelurahan.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
