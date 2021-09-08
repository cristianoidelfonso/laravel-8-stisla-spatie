<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence($nbWords = 5, $variableNbWords = true),

            'content' => $this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            // or
            // 'content' => $this->faker->text($maxNbChars = 200),
        ];
    }
}
