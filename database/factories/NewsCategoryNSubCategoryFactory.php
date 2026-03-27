<?php

use Faker\Generator as Faker;

$factory->define(App\postCategoryNSubcategory::class, function (Faker $faker) {
    return [
        'news_id' => function () {
            return factory(App\news_table::class)->create()->id;
        },
        'category_id' => function () {
            return factory(App\category::class)->create()->id;
        },
        'sub_category_id' => null,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
