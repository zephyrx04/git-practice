<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Reservations\ReservationsController;
use App\Http\Controllers\Documents\DocumentsController;
use App\Http\Controllers\Legal\LegalDocumentsController;
use App\Http\Controllers\Visitors\VisitorsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin dashboard
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Modules (placeholders)
    Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations.index');
    Route::get('/documents', [DocumentsController::class, 'index'])->name('documents.index');
    Route::get('/legal', [LegalDocumentsController::class, 'index'])->name('legal.index');
    Route::get('/visitors', [VisitorsController::class, 'index'])->name('visitors.index');
});

require __DIR__.'/auth.php';
