<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientRecordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| General Pages Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about']);
Route::get('/doctor', [DoctorController::class, 'index']);
Route::get('/department', [HomeController::class, 'department']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/home', [HomeController::class, 'redirect']);
Route::get('/chat', [HomeController::class, 'chat']);
Route::get('/adminChat', [AdminController::class, 'chat']);
Route::get('/doctorChat', [AdminController::class, 'chat']);


/*
|--------------------------------------------------------------------------
| Doctor Management
|--------------------------------------------------------------------------
*/
Route::get('/DoctorSearch', [DoctorController::class, 'searchForm'])->name('doctor.search.form');
Route::get('/add-doctor', [DoctorController::class, 'create'])->name('doctors.create');
Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');
Route::post('/search-doctor', [DoctorController::class, 'search'])->name('search.doctor');
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.all'); // shows all


Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');

/*
|--------------------------------------------------------------------------
| Admin Panel
|--------------------------------------------------------------------------
*/
Route::get('/doctors', [AdminController::class, 'manageDoctors'])->name('doctors.manage');
Route::put('/doctors/{id}', [AdminController::class, 'update'])->name('doctors.update');
Route::delete('/doctors/{id}', [AdminController::class, 'destroy'])->name('doctors.destroy');


Route::get('/admin/add-doctor', [AdminController::class, 'doctorView']); // avoid conflict with above
Route::get('/admin/dashboard', [AdminController::class, 'dashboardHome'])->name('admin.dashboard');
Route::get('/admin/doctors', [AdminController::class, 'manageDoctors'])->name('admin.doctors');
Route::get('/admin/appointments', [AdminController::class, 'manageAppointments'])->name('admin.appointments');
Route::put('/appointments/{id}/status', [AdminController::class, 'updateAppointmentStatus'])->name('appointments.updateStatus');

/*
|--------------------------------------------------------------------------
| appointments management
|--------------------------------------------------------------------------
*/
Route::get('/add-appointment', [AppointmentController::class, 'add']);
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::put('/appointments/{id}', [AppointmentController::class, 'update'])->name('appointments.update');
Route::delete('/appointments/{id}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
Route::post('/check-availability', [AppointmentController::class, 'checkAvailability']);

/*
|--------------------------------------------------------------------------
| Doctor 
|--------------------------------------------------------------------------
*/
Route::get('/Doctor/report', [DoctorController::class, 'report'])->name('Doctor.report');
Route::post('/Doctor/report', [DoctorController::class, 'reportstore'])->name('Doctor.report.store');
Route::get('/Doctor/dashboard', [DoctorController::class, 'dashboardHome'])->name('Doctor.dashboard');
Route::get('/Doctor/doctors', [DoctorController::class, 'manageDoctors'])->name('Doctor.doctors');
Route::get('/Doctor/appointments', [DoctorController::class, 'manageAppointments'])->name('Doctor.appointments');
Route::put('/appointments/{id}/status', [DoctorController::class, 'updateAppointmentStatus'])->name('appointments.updateStatus');
Route::put('/Doctor/profile/{id}', [DoctorController::class, 'update'])->name('doctor.profile.update');
// Admin
Route::get('/admin/report', [PatientRecordController::class, 'create'])->name('admin.report');
Route::post('/admin/report', [PatientRecordController::class, 'store'])->name('admin.report.store');

// User
Route::get('/user/report', [PatientRecordController::class, 'userRecords'])->middleware('auth')->name('user.report');

/*
|--------------------------------------------------------------------------
| Dashboard (Jetstream Auth)
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [AppointmentController::class, 'dashboard'])->name('dashboard');
});

