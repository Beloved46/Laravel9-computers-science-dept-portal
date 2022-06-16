<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrator;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ResultImportController;
use App\Http\Controllers\StudentDash;

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
    return view('home');
});

// Administrator Dashboard 

Route::prefix('/')->middleware('role:administrator')->group(function() {
    Route::get('/admin', [Administrator::class, 'dashboard'])->name('head');
    Route::resource('/allstudents', StudentController::class);
    Route::resource('/allstaff', StaffController::class);
});


// upload results route by staff

Route::group(['middleware'=> ['role:staff']], function() {
    Route::get('result/import', [ResultImportController::class, 'show']);
    Route::post('results/import', [ResultImportController::class, 'import_file']);
});

// student Dashboard
Route::group(['middleware'=>['role:student']], function() {
    Route::get('/student/profile', [StudentDash::class, 'show']);
    Route::get('/student/results', [StudentDash::class, 'ShowResult']);
});

//auth route for both

Route::group(['middleware'=> ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name
    ('dashboard');
});

require __DIR__.'/auth.php';


