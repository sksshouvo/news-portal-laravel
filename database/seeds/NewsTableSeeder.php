<?php
namespace database\Seeders
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        // Ensure there are users and categories to attach
        $users = App\User::all();
        if ($users->count() == 0) {
            $users = factory(App\User::class, 3)->create();
        }

        $categories = App\category::all();
        if ($categories->count() == 0) {
            $categories = factory(App\category::class, 5)->create();
        }

        // Create news items and attach to random users and categories
        factory(App\news_table::class, 30)->create()->each(function ($news) use ($users, $categories) {
            $user = $users->random();
            $news->entry_by = $user->id;
            $news->save();

            // Attach category mapping
            $category = $categories->random();
            App\postCategoryNSubcategory::create([
                'news_id' => $news->id,
                'category_id' => $category->id,
                'sub_category_id' => null,
            ]);

            // Optionally mark some as breaking
            if (rand(1, 10) > 8) {
                App\set_as_breaking_news::create([
                    'set_as' => 'breaking',
                    'news_id' => $news->id,
                    'created_by' => $user->id,
                ]);
            }
        });
    }
}
