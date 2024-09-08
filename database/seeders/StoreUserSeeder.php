<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StoreUser;
use App\Models\Store;
use App\Models\User;
use Faker\Factory as Faker;

class StoreUserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $stores = Store::all();
        $users = User::where('role_id', 4)->get();

        // Assign random users to stores
        foreach ($stores as $store) {
            foreach ($users as $user) {
                StoreUser::create([
                    'store_id' => $store->id,
                    'user_id' => $user->id,
                    'access_level' => $faker->randomElement(['owner', 'employee']), // Random access level
                ]);
            }
        }
    }
}
