<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RPT_FormProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'responseId' => fake()->numberBetween(1, 50000),
            'numField' => fake()->numberBetween(1, 100),
            'corrects' => fake()->numberBetween(1, 100),
            'incorrects' => fake()->numberBetween(1, 100)
        ];
    }
}
