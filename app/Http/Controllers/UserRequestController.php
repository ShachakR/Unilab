<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Course;
use App\Models\Professor;
use App\Models\University;
use App\Models\Request as UserReuqest;

class UserRequestController extends Controller
{
   
    public function createUserRequest(Request $data){
        $exists = UserReuqest::where('request_val', $data['request_val'])->where('type', $data['type'])->first();

        if($exists != null){
            return ['sent' => true];
        }

        if($data['type'] == 'university'){
            if(University::where('name', $data['request_val'])->first()){
                return ['sent' => false];
            }
        }
        if($data['type'] == 'course'){
            if(Course::where('course_code', $data['request_val'])->first()){
                return ['sent' => false];
            }
        }
        if($data['type'] == 'professor'){
            if(Professor::where('name', $data['request_val'])->first()){
                return ['sent' => false];
            }
        }


        UserReuqest::create(
            ['request_val' => $data['request_val'], 'university_name' => $data['university_name'], 'type' => $data['type']]);

        return ['sent' => true];
    }

    public function handleUserRequest(Request $data){    
        UserReuqest::where('id', $data['request_id'])->delete(); 
        
        if($data['accept'] == false){
            return false;
        }

        if($data['type'] == 'university'){
            if(University::where('name', $data['request_val'])->first()){
                return false;
            }

            University::create(
                ['name' => $data['request_val']]);

            return true;
        }

        $university = University::where('name', $data['university_name'])->first();

        if($data['type'] == 'course'){
            if(Course::where('course_code', $data['request_val'])->first()){
                return false;
            }
            Course::create(
                ['course_code' => $data['request_val'], 'university_id' => $university->id]);
        }else{
            if(Professor::where('name', $data['request_val'])->first()){
                return false;
            }
            Professor::create(
                ['name' => $data['request_val'], 'university_id' => $university->id]);
        }

        return true;
    }
}
