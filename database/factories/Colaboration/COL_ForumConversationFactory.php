<?php

namespace Database\Factories\Colaboration;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class COL_ForumConversationFactory extends Factory
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
            'conversationId' => fake()->numberBetween(0, 4000),
            'forumId' => fake()->numberBetween(1, 3000),
            'userId' => fake()->numberBetween(1, 1000),
            'message' => fake()->sentence(),
            'createDate' => fake()->dateTimeBetween($startDate, $endDate),
        ];
    }
}
