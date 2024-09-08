<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Insert the two specific users
        DB::table('users')->insert([
            [
                'name' => 'Abdullah Abid',
                'email' => 'abdrps2004@gmail.com',
                'password' => bcrypt('password'),
                'status' => true,
                'role_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'name' => 'Hanzla Habib',
                'email' => 'sayhi.hanzla@gmail.com',
                'password' => '$2y$12$L2KOuUpth.QzPslprcBoRu0nVbcNJIAbruP4h7BmhGiAFTpxmr5KK',
                'status' => true,
                'role_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);

        // Use Faker to generate additional 6 users
        $faker = Faker::create();

        // Role IDs 2, 3, 4 - 2 users per role
        $roles = [2, 2, 3, 3, 4, 4];

        foreach ($roles as $roleId) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'), // Or use any secure default password
                'status' => true,
                'role_id' => $roleId,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}
