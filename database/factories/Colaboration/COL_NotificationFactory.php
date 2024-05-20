<?php

namespace Database\Factories\Colaboration;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class COL_NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'userId' => fake()->numberBetween(1, 300),
            'typeId' => fake()->numberBetween(1, 5),
            'read' => fake()->boolean(50),
            'body' => fake()->sentence(),
            'header' => fake()->text(50)
        ];
    }
}
