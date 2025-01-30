<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;





Route::get('/', [ReportController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/create', function () {
        return view('report.reportsCreate');
    })->name('report.create');
    Route::put('/reports/{report}/update-status', [ReportController::class, 'updateStatus'])->name('reports.updateStatus');
    Route::post('/create', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
