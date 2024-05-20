<?php

namespace Database\Factories\Learning;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class APR_PlanThemeMaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'planThemeId' => fake()->numberBetween(1, 2000),
            'orderNumber' => fake()->numberBetween(1, 20),
            'link' => fake()->url()
        ];
    }
}
