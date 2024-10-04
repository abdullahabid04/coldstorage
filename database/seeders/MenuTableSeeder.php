<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        DB::table('menus')->insert([
            ['id' => 1, 'title' => 'Home', 'icon' => 'pie-chart', 'url' => NULL, 'route' => 'home', 'parent_id' => NULL, 'display_order' => 0, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'title' => 'Menu Management', 'icon' => 'layout', 'url' => NULL, 'route' => 'menus.index', 'parent_id' => NULL, 'display_order' => 1, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'title' => 'Roles Management', 'icon' => 'tool', 'url' => NULL, 'route' => 'roles.index', 'parent_id' => NULL, 'display_order' => 2, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 4, 'title' => 'User Management', 'icon' => 'users', 'url' => NULL, 'route' => NULL, 'parent_id' => NULL, 'display_order' => 3, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 5, 'title' => 'Users List', 'icon' => NULL, 'url' => NULL, 'route' => 'users.index', 'parent_id' => 4, 'display_order' => 4, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 6, 'title' => 'Add User', 'icon' => NULL, 'url' => NULL, 'route' => 'users.create', 'parent_id' => 4, 'display_order' => 5, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 7, 'title' => 'User Logs', 'icon' => NULL, 'url' => NULL, 'route' => 'users.user-activities', 'parent_id' => 4, 'display_order' => 6, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 8, 'title' => 'Client Management', 'icon' => 'server', 'url' => NULL, 'route' => NULL, 'parent_id' => NULL, 'display_order' => 7, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 9, 'title' => 'Stores', 'icon' => 'grid', 'url' => NULL, 'route' => 'stores.index', 'parent_id' => 8, 'display_order' => 9, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 10, 'title' => 'Areas', 'icon' => 'grid', 'url' => NULL, 'route' => 'areas.index', 'parent_id' => 8, 'display_order' => 10, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 11, 'title' => 'Devices', 'icon' => 'grid', 'url' => NULL, 'route' => 'devices.index', 'parent_id' => 8, 'display_order' => 8, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 17, 'title' => 'Firmware Updates', 'icon' => 'upload-cloud', 'url' => NULL, 'route' => NULL, 'parent_id' => 11, 'display_order' => 1, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 18, 'title' => 'Firmwares', 'icon' => NULL, 'url' => NULL, 'route' => 'firmwares.index', 'parent_id' => 17, 'display_order' => 12, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 19, 'title' => 'Updates', 'icon' => NULL, 'url' => NULL, 'route' => 'firmware_updates.index', 'parent_id' => 17, 'display_order' => 13, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 20, 'title' => 'Device Groups', 'icon' => NULL, 'url' => NULL, 'route' => 'device_groups.index', 'parent_id' => 17, 'display_order' => 14, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 21, 'title' => 'Rollouts', 'icon' => NULL, 'url' => NULL, 'route' => 'rollouts.index', 'parent_id' => 17, 'display_order' => 15, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 22, 'title' => 'Update Progress', 'icon' => NULL, 'url' => NULL, 'route' => 'update_progress.index', 'parent_id' => 17, 'display_order' => 16, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 23, 'title' => 'Update Logs', 'icon' => NULL, 'url' => NULL, 'route' => 'update_logs.index', 'parent_id' => 17, 'display_order' => 17, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 24, 'title' => 'My Clients', 'icon' => NULL, 'url' => NULL, 'route' => 'client.store-clients.index', 'parent_id' => NULL, 'display_order' => 1, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 25, 'title' => 'My Stores', 'icon' => NULL, 'url' => NULL, 'route' => 'client.stores.index', 'parent_id' => NULL, 'display_order' => 2, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 26, 'title' => 'My Store Areas', 'icon' => NULL, 'url' => NULL, 'route' => 'client.areas.index', 'parent_id' => NULL, 'display_order' => 3, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['id' => 27, 'title' => 'My Devices', 'icon' => NULL, 'url' => NULL, 'route' => 'client.devices.index', 'parent_id' => NULL, 'display_order' => 4, 'status' => 1, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
