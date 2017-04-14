<?php
use KC\Models\User\User;
use KC\Models\Device\Device;
use KC\Models\Type\Type;
use KC\Models\Command\Command;
use KC\Models\Route\Route;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
$factory->define(Route::class, function (Faker\Generator $faker) {
    return [
        'code' => strtoupper($faker->word),
        'name' => $faker->name,
        'parent_id' => null
    ];
});
$factory->define(Type::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name, 
        'route_id' => factory(Route::class)->create()->id
    ];
});
$factory->define(Device::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'type_id' => factory(Type::class)->create()->id
    ];
});

$factory->define(Command::class, function (Faker\Generator $faker) {
    return [
        'template' => false,
        'type_id' => factory(Type::class)->create()->id,
        'command_scheme' => [
                'name' => 'SLP',
                'values' => [
                    'L' => 25,
                    'P' => [
                        '#ff0022',
                        '#ff0033'
                    ],
                    'T' => 0.4,
                    'D' => 10
                ]
        ]
    ];
});
$factory->state(Command::class, 'template', function(Faker\Generator $faker) {
    return [
        'template' => true
    ];
});