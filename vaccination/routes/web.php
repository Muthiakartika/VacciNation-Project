<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SuperAdmin;
use App\Http\Middleware\healthcareAdmin;
use App\Http\Middleware\patient;
use App\Http\Controllers\HealthcareController;
use App\Http\Controllers\HealthcareAdministrator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/super-admin/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('superadmin-home')
    ->middleware('SuperAdmin');
Route::get('/admin-healthcare/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('adminhc-home')
    ->middleware('healthcareadmin');
Route::get('/patient/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('patient-home')
    ->middleware('patient');

//Super Admin
Route::resource('add-healthcare', HealthcareController::class);
Route::resource('register-adminhc', \App\Http\Controllers\HealthcareAdministrator::class)
    ->middleware('auth');
Route::resource('add-vaccine', \App\Http\Controllers\VaccineController::class);

//Healthcare Administrator
Route::resource('record-batch', \App\Http\Controllers\BatchController::class);

//Patient
Route::resource('appointment-vaccination', \App\Http\Controllers\VaccinationController::class);
Route::get('appointment-vaccination/{centreName}/create', [\App\Http\Controllers\VaccinationController::class, 'create'])
    ->name('vaccine-appointment');
Route::get('vaccination-status/{id}/show', [\App\Http\Controllers\VaccinationController::class, 'show'])
    ->name('patient-status');


