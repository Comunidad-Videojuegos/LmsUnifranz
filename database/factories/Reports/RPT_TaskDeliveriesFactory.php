<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports\RPT_TaskDeliveries>
 */
class RPT_TaskDeliveriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'studentId' => fake()->numberBetween(1, 900),
            'taskId' => fake()->numberBetween(1, 10000),
            'viewed' => fake()->boolean(20),
            'reviewed' => fake()->boolean(40),
            'calification' => fake()->randomFloat(2, 20, 100)
        ];
    }
}
