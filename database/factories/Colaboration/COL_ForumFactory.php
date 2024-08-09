<?php

namespace Database\Factories\Colaboration;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class COL_ForumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = '2024-01-01';
        $endDate = Carbon::now();

        return [
            'orderNumber' => fake()->numberBetween(1, 20),
            'courseSectionId' => fake()->numberBetween(1, 1000),
            'header' => fake()->text(70),
            'content' => fake()->text(200),
            'valoration' => fake()->optional()->numberBetween(1, 50),
            'createDate' => fake()->dateTimeBetween($startDate, $endDate),
        ];
    }
}
