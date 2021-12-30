<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'university_id',
        'rating'
    ];
    
    public function university(){
        return $this->belongsTo(University::class);
    }

    public function reviews(){
        return $this->hasMany(ProfessorReview::class);
    }
}
