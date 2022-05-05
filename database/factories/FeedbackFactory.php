<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory\App\Models\User>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'userId' => $this->faker->numerify("##"),
            'text' => $this->faker->text("100"),
            'like' => $this->faker->boolean,
            'created_at' => $this->faker->date('d-m-Y'),
            ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'userid' => null,
                'text' => null,
                'like' => null,
                'created_at' => null,
            ];
        });
    }
}
