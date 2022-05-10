<?php

use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProfessorsController;
use App\Http\Controllers\HomeController;
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
Route::get('/GlobalResource/GetSelectedUniversity', [GlobalResource::class, 'getSelectedUniversity']);