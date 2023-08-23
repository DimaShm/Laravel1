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
            'ext_product_id' => $this->faker->numberBetween(1000, 9999),
            'category_id' => Category::all()->random()->id,
            'name' => $this->faker->word,
            'description' => $this->faker->text,
            'price' => $this->faker->numberBetween(0, 1000000),
            'old_price' => $this->faker->numberBetween(0, 1000000),
            'stock' => $this->faker->randomElement([0, 1]),
        ];
    }
}
