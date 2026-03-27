<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MenusAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        $now = Carbon::now();

        // Default main menus to create
        $menus = [
            ['menu_name' => 'Dashboard', 'menu_url' => '/dashboard', 'status' => 1],
            ['menu_name' => 'Posts', 'menu_url' => '/posts', 'status' => 1],
            ['menu_name' => 'Categories', 'menu_url' => '/categories', 'status' => 1],
            ['menu_name' => 'Users', 'menu_url' => '/users', 'status' => 1],
            ['menu_name' => 'Settings', 'menu_url' => '/settings', 'status' => 1],
        ];

        $menuIds = [];
        foreach ($menus as $m) {
            $id = DB::table('menus')->insertGetId(array_merge($m, [
                'created_at' => $now,
                'updated_at' => $now,
                'entry_by' => null,
                'modify_by' => null,
                'remember_token' => Str::random(10),
                'concern_id' => null,
                'icon' => null,
            ]));
            $menuIds[] = $id;
        }

        // Grant each existing user permission to all created menus
        $users = DB::table('users')->select('id')->get();
        foreach ($users as $user) {
            foreach ($menuIds as $mid) {
                DB::table('user_permissions')->insert([
                    'user_id' => $user->id,
                    'main_menu_id' => $mid,
                    'sub_menu_id' => null,
                    'remember_token' => Str::random(10),
                    'action_ip' => null,
                    'concern_id' => null,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
