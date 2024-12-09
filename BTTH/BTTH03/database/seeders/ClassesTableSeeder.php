<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classes')->insert([
            [
                'grade_level' => 'Pre-K',
                'room_number' => 'VH7',
                
            ],
            [
                'grade_level' => 'Kindergarten',
                'room_number' => 'VH8',
                
            ],
        ]);
    }
}
