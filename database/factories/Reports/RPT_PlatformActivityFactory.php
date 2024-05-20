<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RPT_PlatformActivityFactory extends Factory
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
            'typeId' => fake()->numberBetween(1, 7),
            'amount' => fake()->numberBetween(1, 100)
        ];
    }
}
