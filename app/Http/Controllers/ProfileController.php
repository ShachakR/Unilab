<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index($username)
    {
        if(User::where('username', '=', $username)->exists()){
            return view('user.profile', compact('username'));
        }
        return view('user.profile_failed', compact('username'));
    }
}
