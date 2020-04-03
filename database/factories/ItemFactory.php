<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Item;
use App\Menu;
use Faker\Generator as Faker;

$factory->define(Item::class, function (Faker $faker) {
    $menu = factory(Menu::class)->create();

    return [
        'id' => 1,
        'name' => $faker->word,
        'menu_id' => $menu->id
    ];
});
