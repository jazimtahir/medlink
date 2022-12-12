<?php
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('doctors', [App\Http\Controllers\Admin\DoctorController::class, 'index'])->name('doctor.index');
Route::get('doctor/create', [App\Http\Controllers\Admin\DoctorController::class, 'create'])->name('doctor.create');
Route::get('doctor/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'show'])->name('doctor.show');
Route::put('doctor/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'update'])->name('doctor.update');
Route::post('doctor', [App\Http\Controllers\Admin\DoctorController::class, 'store'])->name('doctor.store');
Route::get('doctor/delete/{id}', [App\Http\Controllers\Admin\DoctorController::class, 'destroy'])->name('doctor.destroy');

Route::get('patients', [App\Http\Controllers\Admin\PatientController::class, 'index'])->name('patient.index');
Route::get('patient/create', [App\Http\Controllers\Admin\PatientController::class, 'create'])->name('patient.create');
Route::get('patient/{id}', [App\Http\Controllers\Admin\PatientController::class, 'show'])->name('patient.show');
Route::put('patient/{id}', [App\Http\Controllers\Admin\PatientController::class, 'update'])->name('patient.update');
Route::post('patient', [App\Http\Controllers\Admin\PatientController::class, 'store'])->name('patient.store');
Route::get('patient/delete/{id}', [App\Http\Controllers\Admin\PatientController::class, 'destroy'])->name('patient.destroy');

Route::get('specializations', [App\Http\Controllers\Admin\SpecializationController::class, 'index'])->name('specialization.index');
Route::get('specialization/create', [App\Http\Controllers\Admin\SpecializationController::class, 'create'])->name('specialization.create');
Route::post('specialization', [App\Http\Controllers\Admin\SpecializationController::class, 'store'])->name('specialization.store');
Route::put('specialization/{id}', [App\Http\Controllers\Admin\SpecializationController::class, 'update'])->name('specialization.update');
Route::get('specialization/delete/{id}', [App\Http\Controllers\Admin\SpecializationController::class, 'destroy'])->name('specialization.destroy');
