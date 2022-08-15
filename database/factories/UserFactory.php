<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    $genderArray = [
        'Male',
        'Female',
        'Non-Binary',
    ];
    $gender = array_rand(array_flip($genderArray), 1);

    $firstname = "";
    switch ($gender) {
        case "Male":
            $firstname = $faker->firstNameMale;
            break;
        case "Female":
            $firstname = $faker->firstNameFemale;
            break;
        default:
            $firstname = $faker->firstName;
    }

    $firstname = $faker->firstName;
    $lastname = $faker->lastname;
    $email = $firstname[0] . $lastname . "@" . $faker->safeEmailDomain; //fn[0] to get the 1st name of possible 2 names

    return [
        'firstname' => $firstname,
        'lastname' => $lastname,
        'contact_number' => '09' . rand(100, 999) . rand(100, 999) . rand(100, 999),
        'birthday' => $faker->dateTimeBetween('1985-01-01', '2003-12-31')->format('Y-m-d'),
        'gender' => $gender,
        'email' => $email,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
    ];
});
