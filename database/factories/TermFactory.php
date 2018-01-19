<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Orchid\Platform\Core\Models\Term;

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

$factory->define(Term::class, function (Faker $faker) {
    return [
        'slug' => Str::slug($faker->unique()->word),
        'content' => [
            'en' => [
                'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'body' => $faker->text,
            ],
        ],
        'term_group' => $faker->randomElement($array = [0, 1, 2]),
    ];
});
