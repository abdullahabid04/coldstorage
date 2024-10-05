<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateLogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $levels = ['info', 'warning', 'error'];
        $messages = [
            'Firmware update checked: No update available',
            'Firmware update available: Starting update process',
            'Downloading firmware version v6',
            'Firmware downloaded successfully',
            'Firmware installed successfully',
            'Error during firmware update process: Expecting value: line 1 column 1 (char 0)'
        ];

        for ($i = 1; $i <= 1000; $i++) {
            DB::table('update_logs')->insert([
                'device_id' => rand(1, 100), // Assuming there are 50 devices in the devices table
                'firmware_update_id' => rand(800, 810), // Assuming there are 10 firmware updates in the firmware_updates table, sometimes NULL
                'message' => $messages[array_rand($messages)],
                'level' => $levels[array_rand($levels)],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
