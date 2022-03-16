<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
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

Route::post('teachers', [TeacherController::class, 'store']);

Route::get('teacher', [TeacherController::class, 'index'])->name('teacher');
Route::get('fetchTeachers', [TeacherController::class, 'fetchTeachers'])->name('fetchTeachers');
Route::get('editTeacher/{id}', [TeacherController::class, 'editTeacher'])->name('editTeacher');
Route::delete('deleteTeacher/{id}', [TeacherController::class, 'destroy'])->name('delTeacher');
Route::put('updateTeacher/{id}', [TeacherController::class, 'updateTeacher'])->name('updateTeacher');
Route::get('select/Check', [TeacherController::class, 'selectpage']);
Route::post('multiSelect', [TeacherController::class, 'multiSelect'])->name('multiSelect');
Route::get('create/Student', [StudentController::class, 'create'])->name('createStudent');
Route::post('store/Student', [StudentController::class, 'store'])->name('storeStudent');
Route::get('edit/Student/{id}', [StudentController::class, 'edit'])->name('editStudent');
Route::put('update/Student/{id}', [StudentController::class, 'update'])->name('updateStudent');