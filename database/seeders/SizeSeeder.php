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
            'value' => "NO_SIZE",
        ]);

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

        DB::table('sizes')->insert([
            'value' => "39",
        ]);

        DB::table('sizes')->insert([
            'value' => "40",
        ]);

        DB::table('sizes')->insert([
            'value' => "41",
        ]);

        DB::table('sizes')->insert([
            'value' => "42",
        ]);

        DB::table('sizes')->insert([
            'value' => "43",
        ]);

        DB::table('sizes')->insert([
            'value' => "44",
        ]);
    }
}
