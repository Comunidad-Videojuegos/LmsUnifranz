<?php

namespace Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CON_TaskFactory extends Factory
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
            'valoration' => fake()->randomFloat(2, 20, 100),
            'missing' => fake()->boolean(90),
            'name' => fake()->text(50),
            'description' => fake()->text(100),
        ];
    }
}
