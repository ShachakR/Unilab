<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\ProfessorReview;
use App\Models\University;
use App\Models\Like;
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
        $professors = Professor::where('university_id', $university->id)->get();;
        return view('content.professor.list_page', compact('university', 'professors'));
    }

    //shows specific professor page
    public function show($name)
    {
        $professor = Professor::where('name', '=', $name)->firstOrFail();

        if(Auth::check()){
            //current user
            $user = Auth::user();
            //user liked reviews on this course  
            $likes = Like::select('review_id')->where('user_id', $user->id)->where('type', 'professor')->where('liked', true)->get()->toArray();
            //convert to concentional array

            //user review on this course page
            $user_review = ProfessorReview::where('username', $user->username)->where('professor_id', $professor->id)->first();
            return view('content.professor.review_page', compact('professor', 'likes', 'user', 'user_review'));
        }

        return view('content.professor.review_page', compact('professor'));
    }

    //handle professor reviews
    public function review(Request $request)
    {
        //where clause by defualt assumes '='
        $professor_review = ProfessorReview::updateOrCreate(
            ['username' => $request['username'], 'professor_id' => $request['professor_id']],
            [
                'professor_rating' => doubleval($request['professor_rating']),
                'difficulty_rating' => doubleval($request['difficulty_rating']),
                'take_again' => boolval($request['take_again']),
                'description' => $request['description'],
                'related_course_code' => $request['related_course_code']
            ]

        );

        //calculate new professor rating
        $professor = Professor::find($request['professor_id']);
        $reviews = $professor->reviews;


        $total_rating = 0;
        $total_reviews = $professor->reviews->count();
        foreach ($reviews as $review) {
            $total_rating += $review->professor_rating;
        }

        $newRating = round(($total_rating / $total_reviews));
        $professor->rating = $newRating;
        $professor->save();

        $data = ['professor' => json_encode($professor), 'professor_reviews' => json_encode($professor->reviews)];
        return $data;
    }
}
