<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
  /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'university_name',
        'description',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
