<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        // Create 10 records of products
        Product::factory()->count(10)->create()->each(function ($product) {

            // Seed the relation with 5 sizes
            $sizes = Size::factory()->count(3)->make();
            $product->sizes()->saveMany($sizes);
        });
    }
}
