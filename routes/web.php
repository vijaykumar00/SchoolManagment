<?php

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Models\Student;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

//Registration
Route::get('/create', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store'])->name('home');
Route::get('/login', [RegisterController::class, 'login']);
Route::get('/home', function () {
    return view('/home');
});
Route::post('/home', [RegisterController::class, 'loginConfirem']);
Route::post('logout', [RegisterController::class, 'logout'])->name('logout');


//Student Controller
Route::post('add-student', [StudentController::class, 'store']);
Route::get('/student.dashboard', [StudentController::class, 'index']);
Route::get('/show-Student', [StudentController::class, 'showStudnt']);
Route::get('/Submitasg', [StudentController::class, 'submitAsg']);
Route::get('see-asg', [StudentController::class, 'showAsg']);
Route::get('/add-Student', [StudentController::class, 'registerStudent']);


//Teacher Controller
Route::get('/submited-asg', [TeacherController::class, 'showsubmitedAsg']);
Route::get('/createAsg', [TeacherController::class, 'createAsgnment']);
Route::post('/createAsg', [TeacherController::class, 'store']);
Route::get('/show-student', [TeacherController::class, 'showStudent']);
Route::post('/Submit-asg', [TeacherController::class, 'submitAsg']);
Route::get('editAsg', [TeacherController::class, 'editAsg'])->name('editasg');
Route::get('edit/{id}', [TeacherController::class, 'edit']);
Route::post('/updateAsg/{id}', [TeacherController::class, 'updateAsg'])->name('update');
Route::get('/delete/{id}', [TeacherController::class, 'destroy'])->name('delete');
Route::get('/grade/{id}', [TeacherController::class, 'giveGrade']);
Route::post('/gradeiven/{id}', [TeacherController::class, 'gradegiven']);
