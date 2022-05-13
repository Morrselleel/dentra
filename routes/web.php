<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\enrollments\EnrollmentController;
use App\Http\Controllers\cities\CitiesController;
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
    return view('main');
});




Route::group(['prefix' => 'view'],function(){

    Route::post('/form_1', [AuthController::class, 'loginAuth']);
    Route::post('/logout', [AuthController::class, 'logoutAuth']);
    Route::post('/email_check', [AuthController::class, 'emailChecker']);
    Route::post('/username_check', [AuthController::class, 'userNameCheck']);
    Route::post('/create_user', [AuthController::class, 'createUser']);

    Route::post('/submit_enrollment', [EnrollmentController::class, 'submitEnrollment']);
    Route::get('/chart', [EnrollmentController::class, 'chartData']);
    Route::get('/list', [EnrollmentController::class, 'listData']);
    Route::post('/edit', [EnrollmentController::class, 'editItem']);
    Route::post('/update_enrollment', [EnrollmentController::class, 'updateEnrollment']);
    Route::post('/delete_item', [EnrollmentController::class, 'deleteItem']);

    Route::post('/states', [CitiesController::class, 'stateLoc']);
    Route::post('/cities', [CitiesController::class, 'citesLoc']);

});