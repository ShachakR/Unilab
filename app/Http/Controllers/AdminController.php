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
        $userData = User::all()->makeVisible(['email']);

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
}
