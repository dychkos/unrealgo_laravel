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
        DB::table('order_statuses')->upsert([
            'id' => "1",
            'value' => "waiting",
            'title' => "Чекає на підтвердження",
        ], 'id');

        DB::table('order_statuses')->upsert([
            'id' => "2",
            'value' => "sent",
            'title' => "Відправлено",
        ], 'id');

        DB::table('order_statuses')->upsert([
            'id' => "3",
            'value' => "delivered",
            'title' => "Доставлено",
        ], 'id');

        DB::table('order_statuses')->upsert([
            'id' => "4",
            'value' => "done",
            'title' => "Виконано",
        ], 'id');

        DB::table('order_statuses')->upsert([
            'id' => "5",
            'value' => "canceled",
            'title' => "Відмінено",
        ], 'id');
    }
}
