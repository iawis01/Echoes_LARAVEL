<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = \App\Models\Course::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->paragraph,
            'description' => $this->faker->paragraph,
            'date_start' =>'2022-12-30',
            'date_end' => '2022-01-10',
            'active' => 1,

        ];
    }
}