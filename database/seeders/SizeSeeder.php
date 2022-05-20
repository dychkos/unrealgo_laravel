<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert([
            'value' => "XS",
        ]);

        DB::table('sizes')->insert([
            'value' => "S",
        ]);

        DB::table('sizes')->insert([
            'value' => "M",
        ]);

        DB::table('sizes')->insert([
            'value' => "XL",
        ]);

        DB::table('sizes')->insert([
            'value' => "L",
        ]);
    }
}
