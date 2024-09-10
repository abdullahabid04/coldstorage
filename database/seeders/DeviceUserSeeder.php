<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Device;

class DeviceUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Example store owner ID and client ID (adjust accordingly)
        $client = User::where('role_id', 3)->first(); // Fetch a client
        $deviceIds = Device::take(3)->pluck('id')->toArray(); // Get 3 random devices

        // Map devices to the client
        $client->devices()->sync($deviceIds);
    }
}
