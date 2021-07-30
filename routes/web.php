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
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',[RegisterController::class,'create']);
Route::post('/register',[RegisterController::class,'store'])->name('home');
Route::get('/login',[RegisterController::class,'login']);
// Route::post('/login',[RegisterController::class,'loginConfirem']);
Route::get('/home',[RegisterController::class,'loginConfirem']);
// Route::post('/asg',[TeacherController::class,'index']);
Route::post('add-student', [StudentController::class, 'store']);
Route::get('/student.dashboard',[StudentController::class, 'index']);
Route::get('/createAsg',[TeacherController::class,'createAsgnment']);
Route::post('/createAsg',[TeacherController::class,'store']);
Route::get('/show-student',[TeacherController::class,'showStudent']);
Route::get('/show-Student',[StudentController::class,'showStudnt']);
Route::get('/Submitasg',[StudentController::class,'submitAsg']);
Route::get('see-asg',[StudentController::class,'showAsg']);
Route::get('add-student',[StudentController::class,'registerStudent']);
// Route::post('submit-Asg',[TeacherController::class,'submitAsg']);

