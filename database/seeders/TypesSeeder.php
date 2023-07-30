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
        DB::table('types')->upsert([
            'id' => '1',
            'value' => "Футболки",
            'slug' => "t-shirts",
            'image_path' => "tshirts.svg"
        ], 'id');

        DB::table('types')->upsert([
            'id' => '2',
            'value' => "Майки",
            'slug' => "singlet",
            'image_path' => "singlet.svg"
        ], 'id');

        DB::table('types')->upsert([
            'id' => '3',
            'value' => "Худі",
            'slug' => "hoodie",
            'image_path' => "hoodie.svg"
        ], 'id');

        DB::table('types')->upsert([
            'id' => '4',
            'value' => "Акксесуари",
            'slug' => "access",
            'image_path' => "notes.svg"
        ], 'id');
//
//        DB::table('types')->upsert([
//            'value' => "Взуття",
//            'slug' => "shoes"
//        ]);

    }
}
