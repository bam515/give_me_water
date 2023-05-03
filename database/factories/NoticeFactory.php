<?php

namespace Database\Factories;

use App\Models\Notice;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticeFactory extends Factory
{
    protected $model = Notice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'notice_title' => $this->faker->text,
            'notice_content' => $this->faker->sentence,
            'created_at' => $this->faker->dateTime,
            'updated_at' => null
        ];
    }
}
