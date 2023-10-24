<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
       $brand_id = Brand::query()->inRandomOrder()->value('id');
        return [
            'title' => fake()->go('xxx'),
            'brand_id' => $brand_id,
            'price' => fake()->numberBetween(100,1000),
            'thumbnail' => 'img'
        ];

    }
}
