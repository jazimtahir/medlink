<?php
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('schedule', [App\Http\Controllers\DoctorScheduleController::class, 'index'])->name('schedule');
Route::post('schedule', [App\Http\Controllers\DoctorScheduleController::class, 'store'])->name('schedule.store');

Route::get('appointments', [App\Http\Controllers\AppointmentController::class, 'doctorIndex'])->name('appointment');
Route::post('appointment/cancel', [App\Http\Controllers\AppointmentController::class, 'cancel'])->name('appointment.cancel');
Route::post('appointment/done', [App\Http\Controllers\AppointmentController::class, 'done'])->name('appointment.done');
