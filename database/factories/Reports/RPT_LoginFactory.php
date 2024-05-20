<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RPT_LoginFactory extends Factory
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
            'passCorrect' => fake()->boolean(70),
            'nameCorrect' => fake()->boolean(70),
            'createDate' => fake()->dateTimeBetween('2024-01-01', '2024-12-31'),
        ];
    }
}
