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
        $type = $data['type'];

        $like = Like::updateOrCreate(
            //find like with these attributes 
            ['user_id' => $user_id, 'review_id' => $review_id, 'type' => $type],
            //or create one with these attributes
            ['user_id' => intval($user_id), 
            'review_id' => intval($review_id), 
            'liked' => boolval(true)
            ]
        );

        $review;

        if($type === 'course'){
            $review = CourseReview::where('id', $review_id)->first();
        }else{
            $review = ProfessorReview::where('id', $review_id)->first();
        }

        $review->likes = $review->likes + 1;
        $review->save();
    }

    public function unlike(Request $data){

        $user_id = $data['user_id'];
        $review_id = $data['review_id']; 
        $type = $data['type']; 

        $like = Like::where('user_id', $user_id)->where('review_id', $review_id)->where('type', $type)->first();
        $like->liked = boolval(false);
        $like->save();
        
        $review;

        if($type === 'course'){
            $review = CourseReview::where('id', $review_id)->first();
        }else{
            $review = ProfessorReview::where('id', $review_id)->first();
        }
        
        $review->likes = $review->likes - 1;
        $review->save();
    }
}
