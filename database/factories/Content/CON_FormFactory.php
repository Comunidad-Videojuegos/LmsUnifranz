<?php

namespace Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CON_FormFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'courseSectionId' => fake()->numberBetween(1, 1000),
            'orderNumber' => fake()->numberBetween(1, 20),
            'calification' => fake()->randomFloat(2, 20, 100),
            'createUserId' => fake()->numberBetween(151, 200),
            'duration' => fake()->randomFloat(2, 10, 120),
        ];
    }
}
