<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateProgressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        $statuses = ['pending', 'in_progress', 'completed', 'failed'];

        for ($i = 1; $i <= 1000; $i++) {
            DB::table('update_progress')->insert([
                'device_id' => $faker->numberBetween(10, 30),
                'firmware_update_id' => $faker->optional()->numberBetween(800, 810),
                'status' => $faker->randomElement($statuses),
                'progress' => $faker->numberBetween(0, 100),
                'created_at' => $faker->dateTimeBetween('-1 month', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 month', 'now'),
            ]);
        }
    }
}
