<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
                // RolesTableSeeder::class,
                // UsersTableSeeder::class,
                // MenuTableSeeder::class,

                // MenusRolesTableSeeder::class,
                // StoreSeeder::class,
                // DeviceTableSeeder::class,
                // AreasTableSeeder::class,
            SensorDataSeeder::class,
            // StoreUserSeeder::class,
        ]);
    }
}
