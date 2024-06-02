<?php

namespace Database\Factories\Integration;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Integration\INP_Course>
 */
class INP_CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $initDuration = fake()->dateTimeBetween('2024-02-01', '2024-06-30');
        $endDuration = fake()->dateTimeBetween($initDuration, '2024-06-30');

        return [
            'instructorId' => fake()->numberBetween(901, 1000),
            'referenceId' => fake()->numberBetween(1, 200),
            'name' => fake()->words(3, true),
            'mandatory' => fake()->boolean(90),
            'initials' => fake()->lexify('????'),
            'description' => fake()->sentence(),
            'initDuration' => $initDuration,
            'endDuration' => $endDuration,
            'groupLink' => fake()->url()
        ];
    }
}
