<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'title' => "Крутая футболка",
            'price' => 1200,
            'offer' => 10,
            'description' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
        ]);

        DB::table('products')->insert([
            'title' => "Крутая ямайка",
            'price' => 1200,
            'offer' => 10,
            'description' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
        ]);

        DB::table('products')->insert([
            'title' => "Крутая майка",
            'price' => 1200,
            'offer' => 10,
            'description' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
        ]);

        DB::table('products')->insert([
            'title' => "Крутая tshirt",
            'price' => 1200,
            'offer' => 10,
            'description' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
        ]);
    }
}
