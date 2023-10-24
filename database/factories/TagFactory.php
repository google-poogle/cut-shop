<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->word(),
         //   'slug' => fake()->unique()->safeEmail(),
            'product_id' => rand(1,5),
            'status' => true
        ];
    }

    public function status()
    {
        return $this->state(function (array $attributes) {
            dd($attributes);
            $result = true;
            if(rand(0,1)==1) {
                $result = false;
            }
            return [
                'status' => $result,
            ];
        });
    }
}
