<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    'prevent-back-history',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('backend.index');
    // })->name('dashboard');
    Route::get('/dashboard',[PatientController::class, 'dashboardShow'])->name('dashboard');
    Route::get('/patient', [PatientController::class, 'showForm'])->name('patient.showForm');
    Route::post('/patient-store', [PatientController::class, 'store'])->name('patient.store');
    Route::get('/patient-all', [PatientController::class, 'allPatient'])->name('patient.all');
    Route::get('/patient-edit/{id}', [PatientController::class, 'editData'])->name('patient.edit');
    Route::post('/patient-update/{id}', [PatientController::class, 'updateData'])->name('patient.update');
    Route::get('/patient-profile/{id}', [PatientController::class, 'patientProfileShow'])->name('patient.profile');
    Route::get('/patient-delete/{id}', [PatientController::class, 'deletePatientData'])->name('patient.delete');
});

// registration route 
if (!env('ALLOW_REGISTRATION', false)) {
    Route::any('/register', function() {
        // abort(403);
        return redirect()->back();
    });
}
