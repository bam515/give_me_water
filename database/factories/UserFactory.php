<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
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
            'login_id' => $this->faker->unique()->word,
            'password' => Hash::make($this->faker->password),
            'nick_name' => $this->faker->unique()->name,
            'user_birth' => $this->faker->date,
            'user_gender' => $this->faker->randomElement(['male', 'female']),
            'kakao_id' => null,
            'google_id' => null,
            'status' => 0,
            'created_at' => $this->faker->dateTime,
            'updated_at' => null
        ];
    }

}
