<?php

namespace Database\Factories\Colaboration;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Colaboration\COL_ForumFile>
 */
class COL_ForumFileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['img', 'png', 'xlsx', 'pdf', 'docx'];
        return [
            'forumId' => fake()->numberBetween(1, 3000),
            'link' => 'https://res.cloudinary.com/dm0aq4bey/image/upload/v1715195488/Report/BalanceSheet.pdf',
            'name' => fake()->text(50),
            'description' => fake()->text(100),
            'size' => fake()->numberBetween(1, 10000),
            'type' => fake()->randomElement($types)
        ];
    }
}
