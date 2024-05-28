<?php

namespace Database\Factories\Colaboration;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'conversationId' => fake()->numberBetween(0, 4000),
            'forumId' => fake()->numberBetween(1, 20),
            'educatorId' => fake()->numberBetween(1, 200),
            'message' => fake()->sentence()
        ];
    }
}
