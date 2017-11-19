<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Topic::class, function (Faker $faker) {
    return [
        'topic' => $faker->word,
        'description' => $faker->paragraph,
        'created_by_user_id' => function() {
        	return App\User::all()->random();
        },
        'updated_by_user_id' => function() {
        	return App\User::all()->random();
        }
    ];
});
