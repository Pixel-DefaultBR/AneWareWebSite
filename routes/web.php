<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('site.home');


Route::middleware('auth')->group(function () {
    Route::get('/app', function() {return redirect()->route('site.home');});
    Route::post('/reports', [ReportController::class, 'store'])->name('site.report.store');
    Route::post('/update', [ReportController::class, 'update'])->name('site.report.update');
    Route::post('/delete', [ReportController::class, 'destroy'])->name('site.report.destroy');
});

Route::controller(ReportController::class)->group(function () {
    Route::get('/reports', 'index')->name('site.report.index');
});

Route::prefix('/app')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('app.dashboard.index');
    Route::get('/auth', [AuthController::class, 'index'])->name('app.auth.index');
    Route::post('/login', [AuthController::class, 'login'])->name('app.auth.login');
    Route::post('/register', [AuthController::class, 'register'])->name('app.auth.register');

    Route::controller(AuthController::class)->middleware('auth')->group(function () {
        Route::get('/logout', 'logout')->name('app.auth.logout');
    });

    Route::controller(UserController::class)->middleware('auth')->group(function () {
        Route::get('/{username}', 'index')->name('app.index');
        Route::get('/edit/{username}/', 'edit')->name('app.edit');
        Route::post('/update', 'update')->name('app.update');
    });

    Route::prefix('/dashboard')->middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('app.dashboard.index');
        Route::get('/create', [DashboardController::class, 'create'])->name('app.dashboard.create');
        Route::get('/edit/{id?}', [DashboardController::class, 'edit'])->name('app.dashboard.edit');
    });
});

Route::get('/codes', [CodeController::class, 'index'])->name('site.code');
Route::get('/about', [AboutController::class, 'index'])->name('site.about');


