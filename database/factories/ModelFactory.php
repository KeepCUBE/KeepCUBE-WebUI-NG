<?php

use KC\Models\{
    Room\Room,
    User\User,
    Type\Type,
    Command\Command,
    Route\Route,
    Device\Device
};
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
$factory->define(Room::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text
    ];
});
$factory->define(Device::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'type_id' => factory(Type::class)->create()->id,
        'room_id' => factory(Room::class)->create()->name
    ];
});

$factory->define(Command::class, function (Faker\Generator $faker) {
    return [
        'template' => false,
        'type_id' => factory(Type::class)->create()->id,
        'command_scheme' => [
                'name' => 'SLP',
                'values' => [
                    'L' => 1,
                    'C' => [
                        '#ff0022'
                    ],
                    'T' => 1000
                ]
        ]
    ];
});
$factory->state(Command::class, 'template', function(Faker\Generator $faker) {
    return [
        'template' => true
    ];
});