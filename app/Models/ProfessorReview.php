<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorReview extends Model
{
    use HasFactory;
    protected $fillable = [
        'professor_rating',
        'difficulty_rating',
        'take_again',
        'description',
        'username',
        'professor_id'
    ];

    public function professor(){
        return $this->belongsTo(Professor::class);
    }
}
