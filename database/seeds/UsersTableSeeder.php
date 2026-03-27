<?php

namespace database\Seeders
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create some users for login/testing
        factory(App\User::class, 5)->create()->each(function ($user) {
            $user->password = bcrypt('password');
            $user->save();
        });
    }
}
