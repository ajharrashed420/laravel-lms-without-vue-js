<?php

namespace App\Http\Controllers;

use App\Models\Course;

use App\Models\Review;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $series = Series::take(4)->get();
        $course = Course::take(6)->get();
        $review = Review::take(5)->get();
        return view('home',[
            'series'=>$series,
            'courses'=>$course,
            'reviews'=>$review,
        ]);
    }


    public function dashboard(){
        if (Auth::user()->type ===1) {
            return view('dashboard');
        }else{
            return redirect()->route('home');
        }
    }

    public function archive($archive_type, $slug){

        $allowed_archive_typs = ['series', 'topic', 'duration', 'level', 'platform'];
        
        if(!in_array($archive_type, $allowed_archive_typs)) {
            return abort(404);
        }

        //duration check
        if ($archive_type == 'duration') {
           $allowed_duration = ['1-5-hours' ,'5-10-hours', '10-plus-hours'];

            if(!in_array($slug, $allowed_duration)){
                return abort(404);
            }

            //Check duration slug & duration value (example- 0,1,2)
            if($slug == '1-5-hours') {
                $title = '1-5 hours';
                $db_key_duration = 0;
            }
            elseif($slug == '5-10-hours') {
                $title = '5-10 hours';
                $db_key_duration = 1;
            }
            else {
                $title = '10+ hours';
                $db_key_duration = 2;
            }
            
            $item = 'Course by Duration: '. $title;
            $courses = Course::where('duration', $db_key_duration)->paginate(6);
        }

        //series check
        if ($archive_type== 'series') {
           $series = Series::where('slug', $slug)->first();

           if (empty($series)) {
                return abort(404);
           }

           $item = 'Courses on '. $series->name;
           $courses = $series->courses()->paginate(9);
           
        }

        
        return view('archive.single', [
            'item' => $item,
            'courses' => $courses,
        ]);
        


    }
    
}
