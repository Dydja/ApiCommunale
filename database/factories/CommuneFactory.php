<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommuneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nom' => $this->faker->name(),
            'created_at' => $this->faker->dateTime($max = 'now', $timezone = 'UTC'),
            'updated_at' => $this->faker->dateTime($max = 'now', $timezone = 'UTC'),
        ];
    }
}
