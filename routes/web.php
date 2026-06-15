<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();
        if ($user->isAdmin()) return redirect('/admin/dashboard');
        if ($user->isDoctor()) return redirect('/doctor/dashboard');
        return redirect('/patient/dashboard');
    })->name('dashboard');

    // Patient
    Route::prefix('patient')->group(function () {
        Route::get('/dashboard', [AppointmentController::class, 'index'])->name('patient.dashboard');
        Route::get('/book', [AppointmentController::class, 'create'])->name('appointments.create');
        Route::post('/book', [AppointmentController::class, 'store'])->name('appointments.store');
        Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
    });

    // Doctor
    Route::prefix('doctor')->group(function () {
        Route::get('/dashboard', [DoctorController::class, 'dashboard'])->name('doctor.dashboard');
        Route::patch('/appointments/{appointment}', [DoctorController::class, 'updateAppointment'])->name('doctor.appointment.update');
    });

    // Admin
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/doctors', [AdminController::class, 'makeDoctor'])->name('admin.makeDoctor');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';