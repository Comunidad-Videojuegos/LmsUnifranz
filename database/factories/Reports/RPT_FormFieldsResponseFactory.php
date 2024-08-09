<?php

namespace Database\Factories\Reports;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RPT_FormFieldsResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'formFieldId' => fake()->numberBetween(1, 50000),
            'response' => fake()->text(100),
            'correct' => fake()->boolean(70)
        ];
    }
}
