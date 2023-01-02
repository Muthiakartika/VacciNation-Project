<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')->middleware('verified');

# LOCALIZATION
Route::get('locale/{locale}', function ($locale){
   \Illuminate\Support\Facades\Session::put('locale',$locale);
   return redirect()->back();
});

# SUPER ADMIN
Route::group(['middleware' => 'sAdmin'], function (){
    Route::group(['middleware' => ['verified']], function (){
        //LOGIN
        Route::get('/super-admin/home', [App\Http\Controllers\HomeController::class, 'superHome'])
            ->name('super-admin.home');
        //RESET PASSWORD
        Route::resource('super-admins', \App\Http\Controllers\SuperAdminBioController::class);
        Route::post('super-admins/reset/{id}', [\App\Http\Controllers\SuperAdminBioController::class, 'update'])
            ->name('super-admin.update');
        //CRUD HEALTHCARE CENTRE
        Route::resource('healthcare', \App\Http\Controllers\HealthcareController::class);
        //CRUD VACCINE
        Route::resource('vaccine', \App\Http\Controllers\VaccineController::class);
        //CRUD HEALTHCARE ADMIN
        Route::resource('admin-healthcare', \App\Http\Controllers\HealthcareAdminController::class);
        //SHOW VACCINATION HISTORY
        Route::get('vaccination-history', [\App\Http\Controllers\VaccinationController::class, 'showVaccinationHistory'])
            ->name('vaccinationHistory.index');
    });
});

# HEALTHCARE CENTRE ADMIN
Route::group(['middleware' => 'hAdmin'], function (){
    Route::group(['middleware' => ['verified']], function (){
        //LOGIN
        Route::get('/healthcare-admin/home', [App\Http\Controllers\HomeController::class, 'healthcareHome'])
            ->name('healthcare-admin.home');

        //RESET PASSWORD
        Route::get('admin-healthcares', [\App\Http\Controllers\HealthcareAdminController::class, 'resetIndex'])
            ->name(('admin-healthcare.reset-index'));
        Route::get('admin-healthcares/{id}', [\App\Http\Controllers\HealthcareAdminController::class, 'resetEdit'])
            ->name(('admin-healthcare.reset-password'));
        Route::post('admin-healthcares/reset/{id}', [\App\Http\Controllers\HealthcareAdminController::class, 'resetUpdate'])
            ->name(('admin-healthcare.update-password'));

        //CRUD BATCH
        Route::resource('batches', \App\Http\Controllers\BatchController::class);

        //CRUD MANAGE VACCINATION
        Route::get('manage-vaccination', [\App\Http\Controllers\VaccinationController::class, 'indexManageVaccination'])
            ->name('manage-vaccination.index');
        // CONFIRM VACCINATION
        Route::get('confirm-vaccinations/{id}', [\App\Http\Controllers\VaccinationController::class, 'confirmEdit'])
            ->name('manage-vaccination.confirm');
        Route::post('confirm-vaccinations/update/{id}', [\App\Http\Controllers\VaccinationController::class, 'confirmUpdate'])
            ->name('manage-vaccinations.confirm-update');

        // REJECT VACCINATION
        Route::get('reject-vaccinations/{id}', [\App\Http\Controllers\VaccinationController::class, 'rejectEdit'])
            ->name('manage-vaccination.reject');
        Route::post('reject-vaccinations/{id}', [\App\Http\Controllers\VaccinationController::class, 'rejectUpdate'])
            ->name('manage-vaccinations.reject-update');

        // Administered VACCINATION
        Route::get('administered-vaccinations/{id}', [\App\Http\Controllers\VaccinationController::class, 'administeredCreate'])
            ->name('manage-vaccination.administered');
        Route::post('administered-vaccinations/{id}', [\App\Http\Controllers\VaccinationController::class, 'administeredUpdate'])
            ->name('manage-vaccinations.administered-update');
    });
});

# PATIENT
Route::group(['middleware' => ['patient', 'verified']], function (){
    //LOGIN
    Route::get('/patient/home', [App\Http\Controllers\HomeController::class, 'patientHome'])
        ->name('patient.home');
    //RESET PASSWORD
    Route::get('patients/{id}', [\App\Http\Controllers\PatientBioController::class, 'resetEdit'])
        ->name('patient-reset.edit');
    Route::post('patients/reset/{id}', [\App\Http\Controllers\PatientBioController::class, 'resetUpdate'])
        ->name('patient-reset.update');
    //CRUD PATIENT BIO
    Route::resource('patient-bio', \App\Http\Controllers\PatientBioController::class);
    //CRUD VACCINATION
    Route::resource('vaccinations', \App\Http\Controllers\VaccinationController::class);
    //CREATE VACCINATION
    Route::get('vaccinations/{centreName}/create',[\App\Http\Controllers\VaccinationController::class, 'createVaccination'])
        ->name('vaccination.create');
    //SHOW VACCINATION STATUS
    Route::get('vaccinations/{id}/status',[\App\Http\Controllers\VaccinationController::class, 'statusShow'])
        ->name('vaccination-status.show');
    //CHATBOT
    Route::match(['get','post'], 'botman', [\App\Http\Controllers\BotManController::class,'handle']);
    //SHOW VACCINATION QUEUE
    Route::resource('queues', \App\Http\Controllers\QueueController::class);
});

