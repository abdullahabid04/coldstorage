<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Area; // Ensure you import the Area model
use Illuminate\Support\Facades\DB;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // You can use either DB::table() or Eloquent (Area::create) to seed the data

        // Option 1: Using Eloquent model
        Area::create([
            'title' => 'Area 1',
            'store_id' => 1,  // Assuming store ID 1 exists in the stores table
        ]);

        Area::create([
            'title' => 'Area 2',
            'store_id' => 1,
        ]);

        Area::create([
            'title' => 'Area 3',
            'store_id' => 2,  // Assuming store ID 2 exists
        ]);
    }
}
