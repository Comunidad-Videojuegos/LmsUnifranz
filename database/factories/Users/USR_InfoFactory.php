<?php

namespace Database\Factories\Users;

use App\Models\Users\USR_Info;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class USR_InfoFactory extends Factory
{
    protected $model = USR_Info::class;
    private $ids = [];

    public function definition(): array
    {
        do {
            $id = fake()->numberBetween(1, 10);
        } while (in_array($id, $this->ids));
        $this->ids[] = $id;

        return [
            'id' => $id,
            'names' => fake()->name() ,
            'age' => fake()->numberBetween(18, 50),
            'firstName' =>  fake()->lastName,
            'lastName' => fake()->lastName,
            'ci' => (string)fake()->numberBetween(90000000, 99999999)
        ];
    }
}
