<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Device;
use App\Models\Store;
use Faker\Factory as Faker;

class DeviceTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $stores = Store::all();

        // Loop over each store and assign devices
        foreach ($stores as $store) {
            for ($i = 1; $i <= 25; $i++) {
                Device::create([
                    'serial_number' => 'MC' . str_pad(rand(1, 999999), 6, '0', STR_PAD_LEFT),
                    'description' => $faker->sentence,
                ]);
            }
        }
    }
}
