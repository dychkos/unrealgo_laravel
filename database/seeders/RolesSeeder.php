<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->upsert([
            'id' => "1",
            'value' => "user",
        ], 'id');

        DB::table('roles')->upsert([
            'id' => "2",
            'value' => "admin",
        ], 'id');
    }
}
