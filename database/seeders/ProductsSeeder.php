<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(100)->create();
    }
}
