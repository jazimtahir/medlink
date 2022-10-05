<?php
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('schedule', [App\Http\Controllers\DoctorScheduleController::class, 'index'])->name('schedule');
