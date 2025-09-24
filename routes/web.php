<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\MarkerController;
use App\Http\Controllers\RequestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('accdet');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/find', [FindController::class, 'index'])->name('find.index');

    Route::get('/marker', [MarkerController::class, 'index'])->name('marker.index');
    Route::post('/bookmark/{user}', [MarkerController::class, 'store'])->name('bookmark.store');
    Route::delete('/bookmark/{user}', [MarkerController::class, 'destroy'])->name('bookmark.destroy');

    Route::get('/request', [RequestController::class, 'index'])->name('request.index');
    Route::post('/request', [RequestController::class, 'store'])->name('request.store');
    Route::delete('/request/{request}', [RequestController::class, 'destroy'])->name('request.destroy');
});

Route::get('/special', function() {
    return view('adminHehe');
});

require __DIR__.'/auth.php';