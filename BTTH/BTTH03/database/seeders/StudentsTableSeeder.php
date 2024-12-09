<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'first_name' => 'Anh',
                'last_name' => 'Ta Tuan',
                'date_of_birth' => '2004-08-22',
                'parent_phone' => '1234567890',
                'class_id' => 1,
                
            ],
            [
                'first_name' => 'Chien',
                'last_name' => 'Nguyen Minh',
                'date_of_birth' => '2004-07-15',
                'parent_phone' => '0987654321',
                'class_id' => 2,
                
            ],
        ]);
    }
}
