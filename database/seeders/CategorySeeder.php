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
//        DB::table('categories')->upsert([
//            'value' => "Все статьи",
//            'slug' => "",
//        ]);

        DB::table('categories')->upsert([
            'id' => '1',
            'value' => "Діяльність",
            'slug' => "activity",
        ], 'id');

        DB::table('categories')->upsert([
            'id' => '2',
            'value' => "Здоров'я",
            'slug' => 'health'
        ], 'id');

        DB::table('categories')->upsert([
            'id' => '3',
            'value' => "Особистість",
            'slug' => 'personal'
        ], 'id');

        DB::table('categories')->upsert([
            'id' => '4',
            'value' => "Відпочинок",
            'slug' => 'relax'
        ], 'id');

        DB::table('categories')->upsert([
            'id' => '5',
            'value' => "Стосунки",
            'slug' => 'relationships'
        ], 'id');

    }
}
