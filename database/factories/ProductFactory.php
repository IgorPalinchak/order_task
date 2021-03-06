<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->defineAs(App\Product::class, 'default', function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'description' => $faker->text(500),
    ];
});
