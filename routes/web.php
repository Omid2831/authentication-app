<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TandartsController;
use App\Http\Controllers\AssistentController;
use App\Http\Controllers\MondhygiënistController;
use App\Http\Controllers\PraktijkmanagementController;
use App\Http\Controllers\RoleManagement;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


// Patient dashboard
Route::get('/Patient', [PatientController::class, 'dashboard'])
    ->name('patient.dashboard')
    ->middleware('auth', 'role:patient,praktijkmanagement');

// Assistent dashboard
Route::get('/Assistent', [AssistentController::class, 'dashboard'])
    ->name('assistent.dashboard')
    ->middleware('auth', 'role:assistent,praktijkmanagement');


// Mondhygienist dashbord
Route::get('/Mondhygienist', [MondhygiënistController::class, 'dashboard'])
    ->name('mondhygienist.dashboard')
    ->middleware('auth', 'role:mondhygienist,praktijkmanagement');


// praktijkmanagement dashboard
Route::get('/PraktijkmanagementDashboard', [PraktijkmanagementController::class, 'dashboard'])
    ->name('praktijkmanagement.dashboard')
    ->middleware(['auth', 'role:praktijkmanagement']);

// Tandarts dashboard
Route::get('/TandartsDashboard', [TandartsController::class, 'dashboard'])
    ->name('tandarts.dashboard')
    ->middleware(['auth', 'role:tandarts,praktijkmanagement']);

// Dashboard
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Role Management dashboard RoleManagementDashboard
Route::get('/RoleManagementDashboard', [RoleManagement::class, 'index'])
    ->middleware(['auth', 'role:praktijkmanagement'])
    ->name('rolemanagement.dashboard');

// Role Management - deleting a record from the database
Route::delete('/users/{id}', [RoleManagement::class, 'destroy'])
    ->name('users.destroy');

// Role Managment - Updating the data from the table
Route::put('/users/{id}',[RoleManagement::class, 'update'])
->name('users.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
