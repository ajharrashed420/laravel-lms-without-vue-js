<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Topic extends Model
{
    use HasFactory;


    public function courses(){
        return $this->belongsToMany(Course::class, 'course_topic', 'topic_id', 'course_id');
    }
}
