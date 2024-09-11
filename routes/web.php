<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InsuaranceClaimController;
use App\Http\Controllers\InsuaranceProviderController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LabController;
use App\Http\Controllers\LabTestController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\WardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::resource('wards',WardController::class)->middleware('auth');
Route::resource('medicines',MedicineController::class)->middleware('auth');
Route::resource('doctors',DoctorController::class)->middleware('auth');
Route::resource('patients',PatientController::class)->middleware('auth');
Route::resource('appointments',AppointmentController::class)->middleware('auth');
Route::resource('departments', DepartmentController::class)->middleware('auth');
Route::resource('staffs',StaffController::class)->middleware('auth');
Route::resource('insuaranceproviders',InsuaranceProviderController::class)->middleware('auth');
Route::resource('insuaranceclaims',InsuaranceClaimController::class)->middleware('auth');
Route::resource('prescriptions',PrescriptionController::class)->middleware('auth');
Route::resource('specializations',SpecializationController::class)->middleware('auth');
Route::resource('bills',BillsController::class)->middleware('auth');
Route::resource('diseases',DiseaseController::class)->middleware('auth');
Route::resource('inventorys',InventoryController::class)->middleware('auth');
Route::resource('labs',LabController::class)->middleware('auth');
Route::resource('labtests',LabTestController::class)->middleware('auth');



require __DIR__.'/auth.php';
