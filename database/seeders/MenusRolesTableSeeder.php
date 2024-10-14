<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('menus_roles')->insert([
            ['id' => 1, 'role_id' => 1, 'menu_id' => 2],
            ['id' => 2, 'role_id' => 1, 'menu_id' => 3],
            ['id' => 3, 'role_id' => 1, 'menu_id' => 4],
            ['id' => 4, 'role_id' => 1, 'menu_id' => 5],
            ['id' => 5, 'role_id' => 1, 'menu_id' => 6],
            ['id' => 6, 'role_id' => 1, 'menu_id' => 7],
            ['id' => 7, 'role_id' => 1, 'menu_id' => 8],
            ['id' => 8, 'role_id' => 1, 'menu_id' => 9],
            ['id' => 9, 'role_id' => 1, 'menu_id' => 10],
            ['id' => 10, 'role_id' => 1, 'menu_id' => 11],
            ['id' => 11, 'role_id' => 1, 'menu_id' => 17],
            ['id' => 12, 'role_id' => 1, 'menu_id' => 18],
            ['id' => 13, 'role_id' => 1, 'menu_id' => 19],
            ['id' => 14, 'role_id' => 1, 'menu_id' => 20],
            ['id' => 15, 'role_id' => 1, 'menu_id' => 21],
            ['id' => 16, 'role_id' => 1, 'menu_id' => 22],
            ['id' => 17, 'role_id' => 1, 'menu_id' => 23],
            ['id' => 18, 'role_id' => 3, 'menu_id' => 24],
            ['id' => 19, 'role_id' => 3, 'menu_id' => 25],
            ['id' => 20, 'role_id' => 3, 'menu_id' => 26],
            ['id' => 21, 'role_id' => 3, 'menu_id' => 27],
        ]);
    }
}
