<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MondhygiënistController;
use App\Http\Controllers\TandartsController;
use App\Http\Controllers\PraktijkmanagementController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



// Route::get('/patient', [PatientController::class, 'dashboard'])->name('patient.dashboard');
// Route::get('/mondhygiënist', [MondhygiënistController::class, 'dashboard'])->name('mondhygiënist.dashboard');
// Route::get('/praktijkmanagement', [PraktijkmanagementController::class, 'dashboard'])->name('praktijkmanagement.dashboard');

// Tanddarts dashboard

Route::get('/TandartsDashboard', [TandartsController::class, 'dashboard'])
    ->name('tandarts.dashboard')
    ->middleware(['auth', 'role:tandarts']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
