<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\UserController;



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

//Admins endpoint
Route::resource('/admins', AdminsController::class);

Route::get('/admins', [App\Http\Controllers\AdminsController::class, 'index'])->name('admins.index');

Route::get('/users/index', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

Route::get('/users/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change-password');
Route::post('users/change-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update-password');
