<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index(){
        $profile = Auth::user()->profile; 
        if($profile->university_name == '' || $profile->university_name == null){
            return view('content.course.courses', compact('profile'));
        }
        $university = University::where('name', '=', $profile->university_name)->firstOrFail();
        $courses = $university->courses;
        return view('content.course.courses', compact('profile', 'courses'));
    }
}
