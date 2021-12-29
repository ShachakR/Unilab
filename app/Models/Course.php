<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_code',
        'university_id',
        'rating'
    ];
    
    public function university(){
        return $this->belongsTo(University::class);
    }

    public function reviews(){
        return $this->hasMany(CourseReview::class);
    }
}
