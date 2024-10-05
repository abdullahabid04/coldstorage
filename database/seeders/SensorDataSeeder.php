<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SensorData;
use App\Models\Device;
use Faker\Factory as Faker;

class SensorDataSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $devices = Device::all();

        foreach ($devices as $device) {
            for ($i = 0; $i < 50; $i++) {
                SensorData::create([
                    'area_id' => random_int(1, 15),
                    'device_id' => $device->id,
                    'timestamp' => $faker->dateTimeThisMonth(),
                    'temperature' => rand(20, 35),
                    'humidity' => rand(30, 60),
                ]);
            }
        }
    }
}
