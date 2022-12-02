<?php
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('appointments', [App\Http\Controllers\AppointmentController::class, 'patientIndex'])->name('appointment');
Route::get('appointment/cancel/{id}', [App\Http\Controllers\AppointmentController::class, 'cancel'])->name('appointment.cancel');
