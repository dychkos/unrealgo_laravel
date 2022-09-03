<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'id' => '1',
            'value' => "Футболки",
            'slug' => "tshirts"
        ]);

        DB::table('types')->insert([
            'id' => '2',
            'value' => "Худі",
            'slug' => "hoodie"
        ]);

        DB::table('types')->insert([
            'id' => '3',
            'value' => "Акксесуари",
            'slug' => "access"
        ]);
//
//        DB::table('types')->insert([
//            'value' => "Взуття",
//            'slug' => "shoes"
//        ]);

    }
}
