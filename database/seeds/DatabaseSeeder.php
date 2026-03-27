<?php

namespace Database\seeds;

use Database\Seeds\CategoriesTableSeeder;
use Database\Seeds\NewsCategoryNSubCategoriesSeeder;
use Database\Seeds\NewsTableSeeder;
use Database\Seeds\UsersTableSeeder;
use Illuminate\Database\Seeder;
use MenusAndPermissionsSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(MenusAndPermissionsSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(NewsCategoryNSubCategoriesSeeder::class);
    }
}
