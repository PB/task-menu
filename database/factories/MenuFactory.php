<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Menu;
use Faker\Generator as Faker;

$factory->define(Menu::class, function (Faker $faker) {
    return [
        'id' => 1,
        'name' => $faker->word,
        'max_depth' => 6,
        'max_children' => 6,
    ];
});
