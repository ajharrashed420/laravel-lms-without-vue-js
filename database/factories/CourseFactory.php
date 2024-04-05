<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Platform;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(),
            'slug' => fake()->slug,
            'type' => rand(0,1),
            'resorces' => rand(1,50),
            'price' =>rand(0,1) ? rand(1,100) : 0.00,
            'year' => rand(2020, 2024),
            'image' =>fake()->imageUrl(),
            'description'=> fake()->paragraph(2),
            'link' => fake()->url(),
            'submitted_by' => User::all()->random()->id,
            'duration' => rand(0,2),
            'level' => rand(0,2),
            'platform_id' => Platform::all()->random()->id,

        ];
    }
}
