<?php

namespace Database\Factories\Integration;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Integration\INP_CourseInscribed>
 */
class INP_CourseInscribedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'courseId' => fake()->numberBetween(1, 200),
            'studentId' => fake()->numberBetween(1, 150),
            'careerId' => fake()->numberBetween(1, 12),
            'status' => fake()->sentence(),
            'noteTotal' => fake()->randomFloat(2, 20, 100)
        ];
    }
}
