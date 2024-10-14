<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class FirmwareUpdateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            // Generate two random model names
            $model1 = 'D-' . $faker->numberBetween(1, 10);
            $model2 = 'D-' . $faker->numberBetween(11, 20);

            // Create the compatible models string in the desired format: ["D-5, D-7"]
            $compatibleModels = "[\"$model1, $model2\"]";  // Manually create the string

            DB::table('firmware_updates')->insert([
                'firmware_id' => $faker->numberBetween(1, 10), // assuming 10 firmware versions
                'name' => 'Firmware Update ' . $index,
                'compatible_models' => json_encode($compatibleModels),
                'min_version' => 'v' . $faker->randomDigitNotNull,
                'max_version' => 'v' . $faker->randomDigitNotNull,
                'status' => $faker->randomElement(['active', 'previous', 'rolled_back', 'inactive']),
                'created_at' => Carbon::now()->subDays(rand(1, 30)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
