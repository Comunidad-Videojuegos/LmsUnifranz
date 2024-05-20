<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports\RPT_ActivityAssistance>
 */
class RPT_ActivityAssistanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'studentId' => fake()->numberBetween(1, 150),
            'activityId' => fake()->numberBetween(1, 3000),
            'entry' => fake()->dateTimeBetween('2024-01-01', '2024-12-31'),
            'exit' => fake()->dateTimeBetween('2024-01-01', '2024-12-31'),
        ];
    }
}
