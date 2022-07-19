<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;

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
            $size = Size::where("value", "NO_SIZE")->get();
            if ($size) $product->sizes()->save($size);

        });
    }
}
