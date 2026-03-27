<?php

use Faker\Generator as Faker;

$factory->define(App\set_as_breaking_news::class, function (Faker $faker) {
    return [
        'set_as' => $faker->randomElement(['breaking','feature','top']),
        'news_id' => function () {
            return factory(App\news_table::class)->create()->id;
        },
        'created_by' => function () {
            return factory(App\User::class)->create()->id;
        },
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
