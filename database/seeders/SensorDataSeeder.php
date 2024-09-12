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

        // Assign multiple sensor data entries for each device
        foreach ($devices as $device) {
            for ($i = 0; $i < 100; $i++) { // 5 sensor data entries per device
                SensorData::create([
                    'area_id' => 1,
                    'device_id' => $device->id,
                    'timestamp' => $faker->dateTimeThisMonth(), // Random timestamp within the current month
                    'temperature' => rand(20, 35), // Random temperature value
                    'humidity' => rand(30, 60),   // Random humidity value
                ]);
            }
        }
    }
}
