<?php

namespace Database\Factories\Learning;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class APR_PlanThemeFactory extends Factory
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
            'planId' => fake()->numberBetween(1, 300),
            'orderNumber' => fake()->numberBetween(1, 20),
            'name' => fake()->text(20),
            'description' => fake()->text(50),
        ];
    }
}
