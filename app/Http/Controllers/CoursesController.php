<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseReview;
use App\Models\Like;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index(){
        session_start();
        if(!isset($_SESSION['selected_university'])){
            return view('content.no_university_selected');
        }
        $selected_university = $_SESSION['selected_university'];
        $university = $selected_university;
        $courses = Course::where('university_id', $university->id)->get();
        return view('content.course.list_page', compact('university', 'courses'));
    }

    //shows specific course page
    public function show($course_code){
        $course = Course::where('course_code', '=', $course_code)->firstOrFail(); 
        
        if(Auth::check()){
            //current user
            $user = Auth::user();
            
            //user liked reviews on this course  
            $likes = Like::select('review_id')->where('user_id', $user->id)->where('courseOrProfessor', 'course')->where('liked', true)->get()->toArray();

            //user review on this course page
            $user_review = CourseReview::where('username', $user->username)->where('course_id',$course->id)->first();
            return view('content.course.review_page', compact('course', 'likes', 'user', 'user_review'));
        }

        return view('content.course.review_page', compact('course'));
    }

    
    //handle course reviews
    public function review(Request $request){
        //where clause by defualt assumes '='
        $course_review = CourseReview::updateOrCreate(
            ['username' => $request['username'], 'course_id' => $request['course_id']],
            [
            'course_rating' => doubleval($request['course_rating']),
            'difficulty_rating' => doubleval($request['difficulty_rating']),
            'grade_recived' => $request['grade_recived'],
            'online' => boolval($request['online']),
            'description' => $request['description'],
            'related_professor_name' => $request['related_professor_name'],
            ]

        );

        //calculate new course rating
        $course = Course::find($request['course_id']);
        $reviews = $course->reviews;


        $total_rating = 0;
        $total_reviews = $course->reviews->count();
        foreach($reviews as $review){
            $total_rating += $review->course_rating;
        }

        $newRating = round(($total_rating / $total_reviews));

        $course->rating = $newRating;
        $course->save();

        $data = ['course' => json_encode($course), 'course_reviews' => json_encode($course->reviews)];
        return $data;
    }
}
