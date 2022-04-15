<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'prenom'=>$this->faker->lastName(),
            'numero' =>$this->faker->phoneNumber(),
            'sexe'=>$this->faker->randomElement(['M', 'F']),
            'date_naissance'=>$this->faker->dateTimeThisCentury->format('Y-m-d'),
            'lieu_naissance'=>$this->faker->streetName(),
            'IdCommune'=>1,
            'IdTypeUtilisateur'=>2,
            'created_at' => $this->faker->dateTime($max = 'now', $timezone = 'UTC'),
            'updated_at' => $this->faker->dateTime($max = 'now', $timezone = 'UTC'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
