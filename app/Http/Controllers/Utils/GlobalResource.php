<?php

namespace App\Http\Controllers\Utils;

use App\Http\Controllers\Controller;
use App\Models\University;

class GlobalResource extends Controller{

    public function setSelectedUniversity($university_name){
       $selected_university = University::where('name', '=', $university_name)->firstOrFail();
       session_start();
       $_SESSION['selected_university'] = $selected_university;
    }

    public function getUniversities(){
        $universities = University::all(); 
        $data = ['universities' => json_encode($universities)];
        return $data;
    }

    public function getSelectedUniversity(){
        session_start();
        $data = ['selected' => json_encode($_SESSION['selected_university'])];
        return $data;
    }
}