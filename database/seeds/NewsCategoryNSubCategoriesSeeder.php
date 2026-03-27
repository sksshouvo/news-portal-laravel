<?php
namespace database\Seeders
use Illuminate\Database\Seeder;

class NewsCategoryNSubCategoriesSeeder extends Seeder
{
    public function run()
    {
        // If postCategoryNSubcategory factory exists, create a few mappings
        factory(App\postCategoryNSubcategory::class, 20)->create();
    }
}
