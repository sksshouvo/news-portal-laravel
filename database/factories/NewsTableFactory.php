<?php

use Faker\Generator as Faker;

$factory->define(App\news_table::class, function (Faker $faker) {
    return [
        'post_title_eng' => $faker->sentence(6),
        'post_content_eng' => $faker->paragraphs(3, true),
        'post_type' => $faker->randomElement([1, 2]),
        'post_status' => $faker->randomElement([0, 1]),
        'comment_status' => $faker->randomElement([0, 1]),
        'post_url_eng' => $faker->unique()->slug,
        'post_title_bng' => $faker->sentence(6),
        'post_content_bng' => $faker->paragraphs(2, true),
        'post_url_bng' => $faker->unique()->slug,
        'news_by' => $faker->name,
        'remember_token' => str_random(10),
        'concern_id' => 1,
        'meta_description_bng' => $faker->text(120),
        'meta_description_eng' => $faker->text(120),
        'limit_description_bng' => $faker->text(80),
        'limit_description_eng' => $faker->text(80),
        'sub_title_eng' => $faker->sentence(4),
        'sub_title_bng' => $faker->sentence(4),
        'sub_title_bng_position' => 1,
        'sub_title_eng_position' => 1,
        'entry_by' => function () {
            return factory(App\User::class)->create()->id;
        },
        'updated_by' => null,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
