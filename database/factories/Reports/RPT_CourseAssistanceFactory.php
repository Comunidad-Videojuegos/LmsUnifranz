<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reports\RPT_CourseAssistance>
 */
class RPT_CourseAssistanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'scheduleId' => fake()->numberBetween(1, 400),
            'studentId' => fake()->numberBetween(1, 150),
            'typeId' => fake()->numberBetween(1, 8)
        ];
    }
}
