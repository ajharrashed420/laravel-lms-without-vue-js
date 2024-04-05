<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function courses(Request $request) {

        $search = $request->search; //get search keyword
        $level = $request->level; //get 0, 1, or 2 value
        $duration = $request->duration; //get 0, 1, or 2 value
        $course = Course::when($search !== null, function ($query) use ($search) {
                        return $query->where('name', 'like', "%$search%");
                    })->when($level !== null, function ($query) use ($level) {
                        return $query->where('level', $level);
                    })->when($duration !== null, function ($query) use ($duration) {
                        return $query->where('duration', $duration);
                    })->paginate(6);
        

        return view('courses', [
            'courses' => $course,
        ]);
    }




    public function single($slug){
        $course = Course::where('slug', $slug)->with('platform', 'topices', 'authors', 'series', 'reviews')->first();

        //return response()->json($course);
        
        if(empty($course)){
            return abort(404);
        }
        return view('course.single', [
            'course' => $course
        ]);
    }

}
