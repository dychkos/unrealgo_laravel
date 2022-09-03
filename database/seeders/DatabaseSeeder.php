<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            CategorySeeder::class,
            TypesSeeder::class,
            OrderStatusSeeder::class,
            SizeSeeder::class,
            PageSeeder::class
            //ProductSeeder::class
            //ArticlesSeeder::class,
        ]);
    }
}
