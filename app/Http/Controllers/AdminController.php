<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Course;
use App\Models\Professor;
use App\Models\University;
use App\Models\Request as UserReuqest;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function users(){
        $userData = User::all(); 

        return view('admin.content.users', compact('userData'));
    }

    public function requests(){
        $requestData = UserReuqest::all();
        return view('admin.content.requests', compact('requestData'));
    }

    public function setAdmin(Request $data){
        $user = User::where('id', "=", $data['id'])->first();
        $user->is_admin = boolval($data['is_admin']);
        $user->save();
    }

    public function createUserRequest(Request $data){
        $exists = UserReuqest::where('request_val', $data['request_val'])->where('type', $data['type'])->first();

        if($exists != null){
            return true;
        }

        UserReuqest::create(
            ['request_val' => $data['request_val'], 'university_name' => $data['university_name'], 'type' => $data['type']]);

        return true;
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
