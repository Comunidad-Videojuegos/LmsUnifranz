<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RPT_PlanMaterialProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'planMaterialId' => fake()->numberBetween(1, 3000),
            'studentId' => fake()->numberBetween(1, 150),
            'advance' => fake()->numberBetween(1, 100)
        ];
    }
}
