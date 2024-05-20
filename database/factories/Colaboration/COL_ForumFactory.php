<?php

namespace Database\Factories\Colaboration;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class COL_ForumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'orderNumber' => fake()->numberBetween(1, 20),
            'courseSectionId' => fake()->numberBetween(1, 1000),
            'createUserId' => fake()->numberBetween(151, 200), // Instructor
            'header' => fake()->text(70),
            'content' => fake()->text(200)
        ];
    }
}
