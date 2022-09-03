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
            'id' => "1",
            'value' => "NO_SIZE",
        ]);

        DB::table('sizes')->insert([
            'id' => "2",
            'value' => "XS",
        ]);

        DB::table('sizes')->insert([
            'id' => "3",
            'value' => "S",
        ]);

        DB::table('sizes')->insert([
            'id' => "4",
            'value' => "M",
        ]);

        DB::table('sizes')->insert([
            'id' => "5",
            'value' => "L",
        ]);

        DB::table('sizes')->insert([
            'id' => "6",
            'value' => "XL",
        ]);

        DB::table('sizes')->insert([
            'id' => "7",
            'value' => "39",
        ]);

        DB::table('sizes')->insert([
            'id' => "8",
            'value' => "40",
        ]);

        DB::table('sizes')->insert([
            'id' => "9",
            'value' => "41",
        ]);

        DB::table('sizes')->insert([
            'id' => "10",
            'value' => "42",
        ]);

        DB::table('sizes')->insert([
            'id' => "11",
            'value' => "43",
        ]);

        DB::table('sizes')->insert([
            'id' => "12",
            'value' => "44",
        ]);

        DB::table('sizes')->insert([
            'id' => "13",
            'value' => "45",
        ]);
    }
}
