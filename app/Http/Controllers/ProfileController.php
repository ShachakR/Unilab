<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($username)
    {
        return view('user.profile', compact('username'));
    }
}
