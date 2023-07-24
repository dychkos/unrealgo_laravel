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
        DB::table('sizes')->upsert([
            'id' => "1",
            'value' => "NO_SIZE",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "2",
            'value' => "XS",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "3",
            'value' => "S",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "4",
            'value' => "M",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "5",
            'value' => "L",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "6",
            'value' => "XL",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "7",
            'value' => "39",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "8",
            'value' => "40",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "9",
            'value' => "41",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "10",
            'value' => "42",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "11",
            'value' => "43",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "12",
            'value' => "44",
        ], 'id');

        DB::table('sizes')->upsert([
            'id' => "13",
            'value' => "45",
        ], 'id');
    }
}
