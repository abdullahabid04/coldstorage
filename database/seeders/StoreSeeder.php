<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use Faker\Factory as Faker;

class StoreSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Loop to create multiple stores
        for ($i = 1; $i <= 5; $i++) {
            Store::create([
                'title' => $faker->company,  // Random company name
                'address' => $faker->address, // Random address
                'owner_name' => $faker->name, // Random owner name
                'email' => $faker->unique()->safeEmail, // Random email
            ]);
        }
    }
}
