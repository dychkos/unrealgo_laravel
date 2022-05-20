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
            'value' => "Футболки",
            'slug' => "tshirts"
        ]);

        DB::table('types')->insert([
            'value' => "Книги",
            'slug' => "books"
        ]);


        DB::table('types')->insert([
            'value' => "Акксесуари",
            'slug' => "access"
        ]);

        DB::table('types')->insert([
            'value' => "Взуття",
            'slug' => "shoes"
        ]);

    }
}
