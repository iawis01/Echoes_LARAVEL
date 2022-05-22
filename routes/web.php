<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\EnrollmentsController;
use App\Http\Controllers\ClaseController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\ExamController;
use App\Mail\NotificationMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PercentageController;
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

Route::get('/users/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('change-password');
Route::post('users/change-password', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('update-password');

Route::get('/users/change-username', [App\Http\Controllers\UserController::class, 'changeUsername'])->name('change-username');
Route::post('users/change-username', [App\Http\Controllers\UserController::class, 'updateUsername'])->name('update-username');

Route::get('/users/change-email', [App\Http\Controllers\UserController::class, 'changeEmail'])->name('change-email');
Route::post('users/change-email', [App\Http\Controllers\UserController::class, 'updateEmail'])->name('update-email');

Route::get('/exams/createFinalNote', [App\Http\Controllers\ExamController::class, 'renderFinalNote'])->name('createFinalNote');
Route::post('/exams/createFinalNote', [App\Http\Controllers\ExamController::class, 'createFinalNote'])->name('createFinalNote');


Route::resource('/courses', CoursesController::class);

Route::resource('/enrollments', EnrollmentsController::class);

Route::resource('/classes', ClaseController::class);

Route::resource('/schedules', ScheduleController::class);

Route::resource('/works', WorkController::class);

Route::resource('/exams', ExamController::class);

// Ruta para los emails
Route::get('/email', function() {
    Mail::to(Auth::user()->email)->send(new NotificationMail());
    return new NotificationMail();
});
Route::resource('/percentages', PercentageController::class);


//Admins endpoint
Route::resource('/admins', AdminsController::class);

Route::get('/admins', [App\Http\Controllers\AdminsController::class, 'index'])->name('admins.index');

Route::get('/users/index', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

Route::get('/users/expediente', [App\Http\Controllers\UserController::class, 'expediente'])->name('users.expediente');

Route::post('/users/clasesCurso', [App\Http\Controllers\UserController::class, 'clasesCursoAlumno'])->name('users.clasesCursoAlumno');


Route::post('/users/trabajosClase', [App\Http\Controllers\UserController::class, 'trabajosClaseCurso'])->name('users.trabajosClaseCurso');

//Ya cumplimos esta funcionalidad junto a la anterior en la misma ruta/función del controlador/vista
//Route::post('/users/examenesClase', [App\Http\Controllers\UserController::class, 'examenesClaseCurso'])->name('users.examenesClaseCurso');

Route::post('/users/notaFinal', [App\Http\Controllers\UserController::class, 'notaFinalClaseCurso'])->name('users.notaFinalClaseCurso');



//Route::get('/works', 'App\Http\Controllers\WorkController@index');