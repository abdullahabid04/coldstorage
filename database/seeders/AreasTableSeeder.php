<?php

namespace Database\Seeders;

use App\Models\Store;
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
        $stores = Store::all();

        foreach ($stores as $store) {
            for ($i = 1; $i <= 3; $i++) {
                Area::create([
                    'title' => 'Area ' . $i . $store->id,
                    'store_id' => $store->id,
                ]);
            }
        }
    }
}
