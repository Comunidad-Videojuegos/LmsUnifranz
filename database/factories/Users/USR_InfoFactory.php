<?php

namespace Database\Factories\Users;

use App\Models\Users\USR_Info;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users\USR_Info>
 */
class USR_InfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = USR_Info::class;

    public function definition() : array
    {
        return [
            'id' => User::factory(),
            'firstName' => fake()->name(),
            'momLastName' => fake()->lastName,
            'dadLastName' => fake()->lastName,
            'age' => fake()->numberBetween(18, 50),
            'ci' => (string)fake()->numberBetween(90000000, 99999999)
        ];
    }
}
