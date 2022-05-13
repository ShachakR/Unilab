<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfessorReview;
use App\Models\CourseReview;
use App\Models\User;
use App\Models\Like;

class LikesController extends Controller
{
    
    public function like(Request $data){
        
        $user_id = $data['user_id'];
        $review_id = $data['review_id']; 
        $courseOrProfessor = $data['courseOrProfessor'];

        $like = Like::updateOrCreate(
            //find like with these attributes 
            ['user_id' => $user_id, 'review_id' => $review_id, 'courseOrProfessor' => $courseOrProfessor],
            //or create one with these attributes
            ['user_id' => intval($user_id), 
            'review_id' => intval($review_id), 
            'liked' => boolval(true)
            ]
        );

        $review;

        if($courseOrProfessor === 'course'){
            $review = CourseReview::where('id', $review_id)->first();
        }else{
            $review = ProfessorReview::where('id', $review_id)->first();
        }

        $review->likes = $review->likes + 1;
        $review->save();

        return ['likes' => $review->likes];
    }

    public function unlike(Request $data){

        $user_id = $data['user_id'];
        $review_id = $data['review_id']; 
        $courseOrProfessor = $data['courseOrProfessor']; 

        $like = Like::where('user_id', $user_id)->where('review_id', $review_id)->where('courseOrProfessor', $courseOrProfessor)->first();
        $like->liked = boolval(false);
        $like->save();
        
        $review;

        if($courseOrProfessor === 'course'){
            $review = CourseReview::where('id', $review_id)->first();
        }else{
            $review = ProfessorReview::where('id', $review_id)->first();
        }
        
        $review->likes = $review->likes - 1;
        $review->save();

        return ['likes' => $review->likes];
    }
}
