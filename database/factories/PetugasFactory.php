<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Petugas;
use Faker\Generator as Faker;

$factory->define(Petugas::class, function (Faker $faker) {
    return [
        'nama'      => $faker->name(),
        'nip'       => rand(100000,20000000),
        'pangkat'   => $faker->citySuffix,
        'status'    => $faker->randomElement(['PNS', 'Kontrak']),
        'alamat'    => $faker->address,
    ];
});
