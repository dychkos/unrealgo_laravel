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
            'id' => "1",
            'value' => "waiting",
            'title' => "Чекає на підтвердження",
        ]);

        DB::table('order_statuses')->insert([
            'id' => "2",
            'value' => "sent",
            'title' => "Відправлено",
        ]);

        DB::table('order_statuses')->insert([
            'id' => "3",
            'value' => "delivered",
            'title' => "Доставлено",
        ]);

        DB::table('order_statuses')->insert([
            'id' => "4",
            'value' => "done",
            'title' => "Виконано",
        ]);

        DB::table('order_statuses')->insert([
            'id' => "5",
            'value' => "canceled",
            'title' => "Відмінено",
        ]);
    }
}
