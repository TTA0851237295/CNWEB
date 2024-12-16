<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

    
        foreach (range(1, 10) as $index) {
            DB::table('computers')->insert([
                'computer_name' => 'Lab' . $faker->numberBetween(1, 5) . '-PC' . $index,
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP EliteDesk 800', 'Lenovo ThinkCentre']),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Windows 11 Pro', 'Ubuntu 20.04']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-11700', 'AMD Ryzen 5 5600X']),
                'memory' => $faker->randomElement([8, 16, 32]),
                'available' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

   
        foreach (range(1, 20) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->numberBetween(1, 10), // Tham chiếu ID từ bảng computers
                'reported_by' => $faker->name(),
                'reported_date' => $faker->dateTimeThisYear(),
                'description' => $faker->sentence(),
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
