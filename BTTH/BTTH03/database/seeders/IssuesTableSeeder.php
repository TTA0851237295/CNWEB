<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('issues')->insert([
            [
                'computer_id' => 1,
                'reported_by' => 'John Doe',
                'reported_date' => now(),
                'description' => 'Máy bị chậm khi khởi động.',
                'urgency' => 'Low',
                'status' => 'Open',
                
            ],
            [
                'computer_id' => 2,
                'reported_by' => 'Jane Smith',
                'reported_date' => now(),
                'description' => 'Hệ điều hành không khởi động được.',
                'urgency' => 'High',
                'status' => 'In Progress',
                
            ],
        ]);
    }
}
