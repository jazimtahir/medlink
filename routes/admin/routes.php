<?php
use Illuminate\Support\Facades\Route;

Route::resource('doctor', App\Http\Controllers\Admin\DoctorController::class);
Route::resource('patient', App\Http\Controllers\Admin\PatientController::class);
