<?php

namespace Database\Factories\Content;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CON_CourseSectionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $courses = range(1, 200);
        $courseCounts = [];

        foreach ($courses as $course) {
            $courseCounts[$course] = rand(5, 5); // cada curso se repite entre 5 y 5 veces
        }

        $courseIds = [];
        foreach ($courseCounts as $course => $count) {
            for ($i = 0; $i < $count; $i++) {
                $courseIds[] = $course;
            }
        }

        static $counter = 1;

        if($counter == 6)
            $counter = 1;

        shuffle($courseIds);
        return [
            'courseId' => array_shift($courseIds),
            'assistance' => fake()->boolean(60),
            'name' => 'Hito '. $counter++,
            'initDate' => now(),
            'endDate' => now(),
        ];
    }
}
