<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Topic;
use App\Models\Author;
use App\Models\Course;
use App\Models\Review;
use App\Models\Series;
use App\Models\Platform;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'type'  => 1,
        ]);
        
        
        $series= [
            [
                'name'=>'Laravel',
                'slug'=>'laravel',
                'image'=>'https://pngimg.com/uploads/php/php_PNG20.png'
            ],

            [
                'name'=>'PHP',
                'slug'=>'php',
                'image'=>'https://www.freepnglogos.com/uploads/html5-logo-png/html5-logo-features-flexvdi-5.png'
            ],

            [
                'name'=>'Livewire',
                'slug'=>'livewire',
                'image'=>'https://amanihome.files.wordpress.com/2018/12/javascript-logo.png'
            ],

            [
                'name'=>'Vue.js',
                'slug'=>'vue-js',
                'image'=>'https://upload.wikimedia.org/wikipedia/commons/thumb/2/20/WordPress_logo.svg/1200px-WordPress_logo.svg.png'
            ],

        ];

        foreach($series as $items){
            Series::create([
                'name' => $items['name'],
                'slug' => $items['slug'],
                'image' => $items['image'],
            ]);
        }


        $topics = ['Eluquint','Validation','Authentication','Testing','Refectoring'];

        foreach($topics as $items){
            $slug = strtolower(str_replace(' ', '-', $items));
            Topic::create([
                'name' => $items,
                'slug' => $slug
            ]);
        }

        $platforms = ['Youtube','Facebook','LaravelHub','Vimeo','Tutor'];

        foreach($platforms as $items){
            Platform::create([
                'name' => $items
            ]);
        }




        //Create 50 Users Using Factories
        User::factory(50)->create();

        //Create 50 Users Using Factories
        Author::factory(20)->create();

        //Create Course Using Factories
        Course::factory(20)->create();


        $courses = Course::all();
        foreach($courses as $course){

            //random series array
            $series = Series::all()->random(rand(1,4))->pluck('id')->toArray();
            $course->series()->attach($series);


            //random topics array
            $topics = Topic::all()->random(rand(1,4))->pluck('id')->toArray();
            $course->topices()->attach($topics);

            //random authors array
            $authors = Author::all()->random(rand(1,5))->pluck('id')->toArray();
            $course->authors()->attach($authors);
        }

        Review::factory(70)->create();


    }
}
