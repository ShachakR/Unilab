<?php

namespace App\Http\Controllers\Utils;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\Professor;
use App\Models\Course;


class GlobalResource extends Controller{

    public function setSelectedUniversity($university_name){
       $selected_university = University::where('name', '=', $university_name)->firstOrFail();
       session_start();
       $_SESSION['selected_university'] = $selected_university;
    }
    
    public function getSelectedUniversity(){
        session_start();
        $data = ['selected' => json_encode($_SESSION['selected_university'])];
        return $data;
    }

    public function getUniversities(){
        $universities = University::all(); 
        $data = ['data' => json_encode($universities)];
        return $data;
    }

    public function getProfessors(Request $request){
        if(is_null($request['university_id'])){
            $professors = Professor::all(); 
            $data = ['data' => json_encode($professors)];
            return $data;
        }

        $professors = Professor::where('university_id', $request['university_id'])->get();
        $data = ['data' => json_encode($professors)];
        return $data;
    }

    public function getCourses(Request $request){
        if(is_null($request['university_id'])){
            $courses = Course::all(); 
            $data = ['data' => json_encode($courses)];
            return $data;
        }

        $courses = Course::where('university_id', $request['university_id'])->get(); 
        $data = ['data' => json_encode($courses)];
        return $data;
    }
    
}