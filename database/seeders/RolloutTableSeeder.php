<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RolloutTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            DB::table('rollouts')->insert([
                'device_group_id' => $faker->numberBetween(5, 15), // assuming 10 groups
                'device_id' => $faker->optional()->numberBetween(100, 200), // assuming 50 devices
                'firmware_update_id' => $faker->numberBetween(800, 900), // assuming 10 updates
                'scheduled_at' => Carbon::now()->addDays(rand(1, 30)),
                'status' => $faker->randomElement(['pending', 'active', 'complete', 'failed']),
                'staged_rollout' => $faker->boolean(),
                'rollout_percentage' => $faker->randomFloat(2, 0, 100),
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
