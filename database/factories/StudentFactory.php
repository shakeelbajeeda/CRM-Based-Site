<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Support\Str;
// use Illuminate\Support\Facades\Hash;
use App\Models\StudentParent;




/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->name(),
            'lname' => $this->faker->name(),
            'dob' => $this->faker->dateTimeBetween('1990-01-01', '2022-01-31')
                ->format('Y-m-d'),
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->bothify('?###??##'),
            'phone' => $this->faker->phoneNumber(),
            'parent_id' => StudentParent::pluck('id')->random(),
            'date_of_join' => $this->faker->dateTimeBetween('2015-01-01', '2022-01-31')
                ->format('Y-m-d'),
            'last_login_date' => $this->faker->dateTimeBetween('2022-01-01', '2022-01-31')
                ->format('Y-m-d'),
            'status' => $this->faker->boolean(),
            'last_login_ip' => mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255)


        ];
    }
}
