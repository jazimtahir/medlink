<?php
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('appointments', [App\Http\Controllers\AppointmentController::class, 'patientIndex'])->name('appointment');
Route::post('appointment/cancel', [App\Http\Controllers\AppointmentController::class, 'cancel'])->name('appointment.cancel');
Route::get('schedule-appointment-doctors', [App\Http\Controllers\AppointmentController::class, 'doctors'])->name('appointment.doctors');
Route::get('schedule-appointment/{id}', [App\Http\Controllers\AppointmentController::class, 'schedule'])->name('appointment.schedule');
Route::post('schedule-appointment/{id}', [App\Http\Controllers\AppointmentController::class, 'confirmSchedule'])->name('appointment.schedule.confirm');
