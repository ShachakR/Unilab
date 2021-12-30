<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseReview;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    public function index(){
        $profile = Auth::user()->profile; 
        if($profile->university_name == '' || $profile->university_name == null){
            return view('content.no_university_selected');
        }
        $university = University::where('name', '=', $profile->university_name)->firstOrFail();
        $courses = $university->courses;
        return view('content.course.list_page', compact('profile', 'courses'));
    }

    //shows specific course page
    public function show($course_code){
        $course = Course::where('course_code', '=', $course_code)->firstOrFail(); 
        $user = Auth::user();
        $username = $user->username; 
        $user_review = CourseReview::where('username', $username)->where('course_id',$course->id)->first();
        return view('content.course.review_page', compact('course', 'username', 'user_review'));
    }

    
    //handle course reviews
    public function review(Request $request){
        //where clause by defualt assumes '='
        $course_review = CourseReview::firstOrCreate(
            ['username' => $request['username'], 'course_id' => $request['course_id']],
            [
            'course_rating' => doubleval($request['course_rating']),
            'difficulty_rating' => doubleval($request['difficulty_rating']),
            'grade_recived' => $request['grade_recived'],
            'online' => boolval($request['online']),
            'description' => $request['description']
            ]

        );
        $course_review->course_rating = doubleval($request['course_rating']);
        $course_review->difficulty_rating = doubleval($request['difficulty_rating']);
        $course_review->grade_recived = $request['grade_recived'];
        $course_review->online = boolval($request['online']);
        $course_review->description = $request['description'];
        $course_review->username = $request['username'];
        $course_review->course_id = $request['course_id'];
        $course_review->save();

        //calculate new course rating
        $course = Course::find($request['course_id']);
        $reviews = $course->reviews;


        $total_rating = 0;
        $total_reviews = $course->reviews->count();
        foreach($reviews as $review){
            $total_rating += $review->course_rating;
        }

        $course->rating = ($total_rating / $total_reviews);
        $course->save();

        $data = ['course' => json_encode($course), 'course_reviews' => json_encode($course->reviews)];
        return $data;
    }
}
