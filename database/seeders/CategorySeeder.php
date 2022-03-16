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
        DB::table('categories')->insert([
            'value' => "Мотивация",
            'slug' => "motivation",
        ]);

        DB::table('categories')->insert([
            'value' => "Здоровье",
            'slug' => 'health'
        ]);

        DB::table('categories')->insert([
            'value' => "Стиль жизни",
            'slug' => 'life-style'
        ]);

        DB::table('categories')->insert([
            'value' => "Работа",
            'slug' => 'work'

        ]);

        DB::table('categories')->insert([
            'value' => "Отдых",
            'slug' => 'relax'

        ]);
    }
}
