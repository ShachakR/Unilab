<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\ProfessorReview;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfessorsController extends Controller
{
    public function index()
    {
        session_start();
        if(!isset($_SESSION['selected_university'])){
            return view('content.no_university_selected');
        }
        $selected_university = $_SESSION['selected_university'];
        $university = $selected_university;
        $professors = $university->professors;
        return view('content.professor.list_page', compact('university', 'professors'));
    }

    //shows specific professor page
    public function show($name)
    {
        $professor = Professor::where('name', '=', $name)->firstOrFail();
        if(Auth::check()){
            $user = Auth::user();
            $username = $user->username;
            $user_review = ProfessorReview::where('username', $username)->where('professor_id', $professor->id)->first();
        }else{
            $user = null;
            $username = null;
            $user_review = null; 
        }
        return view('content.professor.review_page', compact('professor', 'username', 'user_review'));
    }

    //handle professor reviews
    public function review(Request $request)
    {
        //where clause by defualt assumes '='
        $professor_review = ProfessorReview::firstOrCreate(
            ['username' => $request['username'], 'professor_id' => $request['professor_id']],
            [
                'professor_rating' => doubleval($request['professor_rating']),
                'difficulty_rating' => doubleval($request['difficulty_rating']),
                'take_again' => boolval($request['take_again']),
                'description' => $request['description']
            ]

        );
        $professor_review->professor_rating = doubleval($request['professor_rating']);
        $professor_review->difficulty_rating = doubleval($request['difficulty_rating']);
        $professor_review->take_again = boolval($request['take_again']);
        $professor_review->description = $request['description'];
        $professor_review->username = $request['username'];
        $professor_review->professor_id = $request['professor_id'];
        $professor_review->save();

        //calculate new professor rating
        $professor = Professor::find($request['professor_id']);
        $reviews = $professor->reviews;


        $total_rating = 0;
        $total_reviews = $professor->reviews->count();
        foreach ($reviews as $review) {
            $total_rating += $review->professor_rating;
        }

        $professor->rating = ($total_rating / $total_reviews);
        $professor->save();

        $data = ['professor' => json_encode($professor), 'professor_reviews' => json_encode($professor->reviews)];
        return $data;
    }
}
