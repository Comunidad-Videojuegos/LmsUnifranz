<?php

namespace Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CON_ActivityFactory extends Factory
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
            'typeId' => fake()->numberBetween(1, 8),
            'orderNumber' => fake()->numberBetween(1, 20),
            'name' => fake()->text(30),
            'description' => fake()->text(100),
            'calification' => fake()->randomFloat(2, 20, 100),
            'duration' => fake()->randomFloat(2, 10, 120),
            'virtual' => fake()->boolean(70),
            'activityDate' => fake()->dateTimeBetween('2024-01-01', '2024-12-31'),
        ];
    }
}
