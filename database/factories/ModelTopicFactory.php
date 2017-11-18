<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Topic::class, function (Faker $faker) {
    return [
        'topic' => $faker->word,
        'description' => $faker->paragraph
    ];
});
