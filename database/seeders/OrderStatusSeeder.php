<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->insert([
            'value' => "waiting",
            'title' => "Чекає на підтвердження",
        ]);

        DB::table('order_statuses')->insert([
            'value' => "sent",
            'title' => "Відправлено",
        ]);

        DB::table('order_statuses')->insert([
            'value' => "delivered",
            'title' => "Доставлено",
        ]);

        DB::table('order_statuses')->insert([
            'value' => "done",
            'title' => "Виконано",
        ]);

        DB::table('order_statuses')->insert([
            'value' => "canceled",
            'title' => "Відмінено",
        ]);
    }
}
