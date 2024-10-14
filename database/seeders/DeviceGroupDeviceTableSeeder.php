<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DeviceGroupDeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach (range(1, 1000) as $index) {
            DB::table('device_group_device')->insert([
                'device_group_id' => $faker->numberBetween(1, 25), // assuming 10 device groups
                'device_id' => $faker->numberBetween(1, 1000), // assuming 50 devices
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
