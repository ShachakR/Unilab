<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_rating',
        'difficulty_rating',
        'grade_recived',
        'online',
        'description',
        'username',
        'course_id'
    ];

    public function course(){
        return $this->belongsTo(Course::class);
    }
}
