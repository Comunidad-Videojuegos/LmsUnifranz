<?php

namespace Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CON_TaskGroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = '2024-02-01';
        $endDate = Carbon::now();

        return [
            'name' => fake()->text(50),
            'description' => fake()->text(100),
            'createDate' => fake()->dateTimeBetween($startDate, $endDate)
        ];
    }
}
