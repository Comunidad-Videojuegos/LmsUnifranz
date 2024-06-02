<?php

namespace Database\Factories\Colaboration;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class COL_NotificationFactory extends Factory
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
            'userId' => fake()->numberBetween(1, 1000),
            'typeId' => fake()->numberBetween(1, 5),
            'read' => fake()->boolean(50),
            'body' => fake()->sentence(),
            'header' => fake()->text(50),
            'createDate' => fake()->dateTimeBetween($startDate, $endDate),
        ];
    }
}
