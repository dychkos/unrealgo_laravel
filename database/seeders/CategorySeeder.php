<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        DB::table('categories')->insert([
//            'value' => "Все статьи",
//            'slug' => "",
//        ]);

        DB::table('categories')->insert([
            'value' => "Мотивація",
            'slug' => "motivation",
        ]);

        DB::table('categories')->insert([
            'value' => "Здоров'я",
            'slug' => 'health'
        ]);

        DB::table('categories')->insert([
            'value' => "Психологія",
            'slug' => 'psychology'
        ]);

        DB::table('categories')->insert([
            'value' => "Стиль життя",
            'slug' => 'life-style'
        ]);

    }
}
