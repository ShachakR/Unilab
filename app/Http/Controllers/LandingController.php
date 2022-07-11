<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\University;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $universities = University::all(); 

        if(Auth::check()){
            $user = Auth::user();
            $profile = $user->profile;
            $user_university = University::where('name', '=', $profile->university_name)->first();
            return view('landing', compact('universities', 'user_university'));
        }

        return view('landing', compact('universities'));
    }

    public function select_university(Request $request)
    {
        $selected_university = University::where('name', '=', $request['university_name'])->firstOrFail();
        session_start();
        $_SESSION['selected_university'] = $selected_university;
    }
}
