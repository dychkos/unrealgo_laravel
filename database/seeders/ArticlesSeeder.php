<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->upsert([
            'id' => 1,
            'category_id' => "4",
            'slug' => "vigoranie",
            'title' => "Почему все кругом выгорают?",
            'views' => "12",
            'body' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
            'description' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
        ], 'id');

        DB::table('articles')->upsert([
            'id' => 2,
            'category_id' => "4",
            'slug' => "better",
            'title' => "Завтра всё будет лучше?",
            'views' => "1100",
            'body' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
            'description' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
        ], 'id');

        DB::table('articles')->upsert([
            'id' => 3,
            'category_id' => "1",
            'slug' => "strikalo",
            'title' => "Всё решится само собой",
            'views' => "12",
            'body' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
            'description' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
        ], 'id');

        DB::table('articles')->upsert([
            'id' => 4,
            'category_id' => "3",
            'slug' => "vigoranie2",
            'title' => "Почему все кругом выгорают?",
            'views' => "1200",
            'body' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
            'description' => "Объясните, почему все кругом выгорают? Вся лента забита контентом про выгорание, все друзья выгорели, все молодежные издания запустили курсы и подкасты про выгорание.",
        ], 'id');

    }
}
