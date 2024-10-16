<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AuthController;


// Main routes
Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::get('/profile', [ProfileController::class, 'index'])->name('site.profile.profile');
Route::post('/profile/edit', [ProfileController::class, 'edit'])->name('site.profile.edit');

Route::prefix('/report')->group(function () {
    Route::get('/', [ReportController::class, 'index'])->name('site.report.index');
    Route::get('/create', [ReportController::class, 'store'])->name('site.report.store');
    Route::post('/create', [ReportController::class, 'store'])->name('site.report.store');

    Route::get('/delete/{id?}', [ReportController::class, 'destroy'])->name('site.report.delete');
});

Route::prefix('/auth')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.index');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('/edit', [AuthController::class, 'edit'])->name('auth.edit');
});


// Falback route
Route::fallback(function() {
    return redirect()->route('site.home')->with('error', 'Recurso não encontrado.');
});

