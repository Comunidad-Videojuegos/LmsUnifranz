<?php

namespace Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Content\CON_FormResponse>
 */
class CON_FormResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'formId' => fake()->numberBetween(1, 4000),
            'studentId' => fake()->numberBetween(1, 150),
            'calification' => fake()->randomFloat(2, 20, 100),
            'duration' => fake()->numberBetween(10, 120)
        ];
    }
}
