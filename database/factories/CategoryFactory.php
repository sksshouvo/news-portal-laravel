<?php

use Faker\Generator as Faker;

$factory->define(App\category::class, function (Faker $faker) {
    return [
        'category' => $faker->word,
        'category_eng' => ucfirst($faker->word),
        'category_description' => $faker->sentence(10),
        'category_icon' => null,
        'remember_token' => str_random(10),
        'created_by' => function () {
            return factory(App\User::class)->create()->id;
        },
        'updated_by' => null,
        'action_ip' => '127.0.0.1',
        'concern_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
        'status' => 1,
    ];
});
