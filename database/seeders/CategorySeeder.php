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
            'id' => '1',
            'value' => "Діяльність",
            'slug' => "activity",
        ]);

        DB::table('categories')->insert([
            'id' => '2',
            'value' => "Здоров'я",
            'slug' => 'health'
        ]);

        DB::table('categories')->insert([
            'id' => '3',
            'value' => "Особистість",
            'slug' => 'personal'
        ]);

        DB::table('categories')->insert([
            'id' => '4',
            'value' => "Відпочинок",
            'slug' => 'relax'
        ]);

        DB::table('categories')->insert([
            'id' => '5',
            'value' => "Стосунки",
            'slug' => 'relationships'
        ]);

    }
}
