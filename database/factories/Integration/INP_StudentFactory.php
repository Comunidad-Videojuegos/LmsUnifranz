<?php

namespace Database\Factories\Integration;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Integration\INP_Student;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class INP_StudentFactory extends Factory
{

    protected $model = INP_Student::class;

    public function definition(): array
    {

        return [
            'id' => fake()->unique()->numberBetween(1, 150),
            'careerId' => fake()->numberBetween(1, 12),
            'semester' => fake()->numberBetween(1, 12),
            'referenceId' => 1
        ];
    }
}
