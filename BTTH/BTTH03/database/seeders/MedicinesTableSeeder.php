<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('medicines')->insert([
            [
                'name' => 'Paracetamol',
                'brand' => 'ABC Pharma',
                'dosage' => '500mg',
                'form' => 'viên nén',
                'price' => 15000,
                'stock' => 100,
            ],
            [
                'name' => 'Ibuprofen',
                'brand' => 'XYZ Pharma',
                'dosage' => '200mg',
                'form' => 'viên nang',
                'price' => 20000,
                'stock' => 50,
            ],
            [
                'name' => 'Vitamin C',
                'brand' => 'NutriHealth',
                'dosage' => '1000mg',
                'form' => 'xi-rô',
                'price' => 30000,
                'stock' => 200,
            ],
        ]);

    }
}
