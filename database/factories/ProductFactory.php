<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    public function definition(): array
    {
        return [
            'ext_product_id' => fake()->unique()->numberBetween(1000, 9999),
            'category_id' => Category::all()->random()->id,
            'name' => fake()->word,
            'description' => fake()->text,
            'price' => fake()->numberBetween(0, 1000000),
            'old_price' => fake()->numberBetween(0, 1000000),
            'stock' => fake()->randomElement([0, 1]),
        ];
    }
}
