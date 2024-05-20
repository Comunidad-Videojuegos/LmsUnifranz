<?php

namespace Database\Factories\Learning;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class APR_PlanCalificationFactory extends Factory
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
            'name' => fake()->text(20),
            'calification' =>  fake()->randomFloat(2, 50, 100)
        ];
    }
}
