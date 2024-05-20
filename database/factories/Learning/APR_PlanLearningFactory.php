<?php

namespace Database\Factories\Learning;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class APR_PlanLearningFactory extends Factory
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
            'name' => fake()->text(20),
            'description' => fake()->text(50),
        ];
    }
}
