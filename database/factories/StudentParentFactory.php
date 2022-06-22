<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentParent>
 */
class StudentParentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'business' => $this->faker->company(),
            'dob' => $this->faker->dateTimeBetween('1990-01-01', '2022-01-31')
                ->format('Y-m-d'),
            'email' => $this->faker->safeEmail(),
            'password' => Hash::make(Str::random(10)),
            'phone' => $this->faker->phoneNumber(),
            'last_login_date' => $this->faker->dateTimeBetween('2004-01-01', '2022-01-31')
                ->format('Y-m-d'),
            'last_login_ip' => mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255)


        ];
    }
}
