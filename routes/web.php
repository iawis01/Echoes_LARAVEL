<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ScheduleController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Courses endpoint
//Route::get('/courses', [CoursesController::class, 'index']);

Route::resource('/courses', CoursesController::class);

Route::resource('/enrollments', EnrollmentsController::class);

Route::resource('/classes', ClaseController::class);

Route::resource('/schedules', ScheduleController::class);

//Admins endpoint
Route::resource('/admins', AdminsController::class);

Route::get('/admins', [App\Http\Controllers\AdminsController::class, 'index'])->name('admins.index');

Route::get('/users/index', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

Route::get('/users/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change-password');
Route::post('users/change-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update-password');

Route::get('/users/change-username', [App\Http\Controllers\UserController::class, 'changeUsername'])->name('change-username');
Route::post('users/change-username', [App\Http\Controllers\UserController::class, 'updateUsername'])->name('update-username');

Route::get('/users/change-email', [App\Http\Controllers\UserController::class, 'changeEmail'])->name('change-email');
Route::post('users/change-email', [App\Http\Controllers\UserController::class, 'updateEmail'])->name('update-email');
