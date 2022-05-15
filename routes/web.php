<?php

use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProfessorsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserRequestController;
use App\Http\Controllers\Utils\GlobalResource;
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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function() {
    //Admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin');

    //Admin-Users
    Route::get('/admin/users', [AdminController::class, 'users'])->name('users');
    Route::put('/admin/setAdmin', [AdminController::class, 'setAdmin']);

    //Admin-Requests
    Route::get('/admin/requests', [AdminController::class, 'requests'])->name('requests');
});

//User Requests
Route::put('/request/createUserRequest', [UserRequestController::class, 'createUserRequest']);
Route::put('/request/handleUserRequest', [UserRequestController::class, 'handleUserRequest']);

//Courses
Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
Route::get('/courses/{course_code}', [CoursesController::class, 'show'])->name('course');
Route::put('/courses/{course_code}', [CoursesController::class, 'review'])->name('course.review');

//professors
Route::get('/professors', [ProfessorsController::class, 'index'])->name('professors');
Route::get('/professors/{name}', [ProfessorsController::class, 'show'])->name('professor');
Route::put('/professors/{name}', [ProfessorsController::class, 'review'])->name('professor.review');

//profiles
Route::get('/{username}', [ProfilesController::class, 'index'])->name('profile');
Route::put('/{username}', [ProfilesController::class, 'update'])->name('profile.update');

//Globals
Route::put('/GlobalResource/SelectedUniversity/{university_name}', [GlobalResource::class, 'setSelectedUniversity']);
Route::get('/GlobalResource/GetUniversities', [GlobalResource::class, 'getUniversities']);
Route::get('/GlobalResource/GetProfessors', [GlobalResource::class, 'getProfessors']);
Route::get('/GlobalResource/GetCourses', [GlobalResource::class, 'getCourses']);
Route::get('/GlobalResource/GetSelectedUniversity', [GlobalResource::class, 'getSelectedUniversity']);

//review likes
Route::put('/review/like', [LikesController::class, 'like'])->name('like');
Route::put('/review/unlike', [LikesController::class, 'unlike'])->name('unlike');