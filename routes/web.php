<?php

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
})->name('/');

Route::get('/registration', function () {
    return view('registration.create');
})->name('registration');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('register/user', [App\Http\Controllers\StudentController::class, 'store'])->name('register:user');

Route::get('student/index', [App\Http\Controllers\StudentController::class, 'index'])->name('student:index');
Route::get('student/edit/{student}', [App\Http\Controllers\StudentController::class, 'edit'])->name('student:edit');
Route::post('student/update/{student}', [App\Http\Controllers\StudentController::class, 'update'])->name('student:update');
Route::get('student/index/approve/{student}', [App\Http\Controllers\StudentController::class, 'approve'])->name('student:approve');
Route::get('student/index/reject/{student}', [App\Http\Controllers\StudentController::class, 'reject'])->name('student:reject');
Route::get('student/index/show/{student}', [App\Http\Controllers\StudentController::class, 'show'])->name('student:show');
Route::get('student/destroy/{student}', [App\Http\Controllers\StudentController::class, 'destroy'])->name('student:destroy');






