<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarberController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HeadBarberController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// barber shop routes
Route::middleware(['auth', 'role:head_barber'])->group(function () {
    Route::get('/head-barber/dashboard', [HeadBarberController::class, 'index'])->name('head_barber.dashboard');
    Route::get('/head-barber/reports', [HeadBarberController::class, 'reports'])->name('head_barber.reports');
});

Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', [ClientController::class, 'index'])->name('dashboard');

    // Barber routes
    // Route::middleware('auth', 'role:barber')->group(function () {
    //     Route::get('/barber', [BarberController::class, 'index'])->name('barber.dashboard');
    //     Route::get('/barber/schedule', [BarberController::class, 'schedule'])->name('barber.schedule');
    // });

    // Client routes
    Route::middleware(['auth', 'role:client'])->group(function () {
        Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create'); // Appointment form
        Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');        // Book appointment
        Route::get('/appointments/availability/{barber}', [AppointmentController::class, 'getAvailability'])->name('appointments.availability'); // Fetch availability
        Route::get('/appointments', [ClientController::class, 'appointments'])->name('client.appointments');      // Client appointment list
    });
});

require __DIR__.'/auth.php';
