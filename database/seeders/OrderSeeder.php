<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run() {
        $user = User::first();
        Order::create([
            'customer_name' => 'Company A',
            'customer_number' => 12345,
            'fiscal_data' => 'Company A fiscal info',
            'order_date' => now(),
            'delivery_address' => '123 Street',
            'notes' => 'Urgent delivery',
            'user_id' => $user->id,
        ]);
    }
}
