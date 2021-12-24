<?php

use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
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
    if(Auth::guest()){
        return view('welcome');
    }else{
        return redirect()->route('home');
    }
    
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
    Route::get('/{username}', [ProfilesController::class, 'index'])->name('profile');
    Route::put('/{username}', [ProfilesController::class, 'update'])->name('profile.update');
});
