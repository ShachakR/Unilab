<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        session_start();
        if(!isset($_SESSION['selected_university'])){
            return view('content.no_university_selected');
        }
        $selected_university = $_SESSION['selected_university'];
        $university = $selected_university;

       return view('home', compact('university'));
    }
}
