<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'medicine_id' => 1,
                'quantity' => 2,
                'sale_date' => '2024-12-08 14:30:00',
                'customer_phone' => '0987654321',
            ],
            [
                'medicine_id' => 2,
                'quantity' => 1,
                'sale_date' => '2024-12-09 10:00:00',
                'customer_phone' => '0971234567',
            ],
            [
                'medicine_id' => 3,
                'quantity' => 5,
                'sale_date' => '2024-12-09 15:45:00',
                'customer_phone' => '0861234567',
            ],
        ]);
    }
}
