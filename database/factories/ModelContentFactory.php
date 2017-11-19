<?php

use App\Model\Topic;
use Faker\Generator as Faker;

$factory->define(App\Model\Content::class, function (Faker $faker) {
    return [
    	'topic_id' => function() {
    		return Topic::all()->random();
    	},
        'content' => $faker->word,
        'details' => $faker->paragraph,
        'created_by_user_id' => function() {
        	return App\User::all()->random();
        },
        'updated_by_user_id' => function() {
        	return App\User::all()->random();
        }        
    ];
});
