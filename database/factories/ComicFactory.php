<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comic;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Comic::class, function (Faker $faker) {
    $title = $faker->sentence($faker->numberBetween(1, 8), true);
    $trimmed = substr($title, 0, 255);

    $statusArray = [
        'Reading',
        'Stacked',
        'Completed',
        'Plan To Read',
        'On Hold',
        'Dropped',
    ];
    $status = array_rand(array_flip($statusArray), 1);

    /*
    $p_statusArray = [
        'Ongoing',
        'Completed',
        'Hiatus',
        'Cancelled',
    ];
    $p_status = array_rand(array_flip($p_statusArray), 1);
    */

    return [
        'title' => $trimmed,
        'slug' => Str::slug($trimmed),
        'chapter' => rand(35, 100),
        'reading_status' => $status,
        // 'publication_status' => $p_status,
    ];
});
