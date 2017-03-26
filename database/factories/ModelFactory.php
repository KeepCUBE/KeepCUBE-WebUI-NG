<?php
use KC\Models\User\User;
use KC\Models\Device\Device;
use KC\Models\Type\Type;
use KC\Models\Command\Command;
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
$factory->define(Type::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name
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
        'command' => '#SLPL4T2D1Pff0022ff0011ff0022;',
        'type_id' => factory(Type::class)->create()->id
    ];
});