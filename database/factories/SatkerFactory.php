<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Satker;
use Faker\Generator as Faker;

$factory->define(Satker::class, function (Faker $faker) {
    return [
        'nama'          => "Satker Wilayah 1",
        'nama_pimpinan' => $faker->name,
        'alamat'    => $faker->streetAddress,
        'iso'       => $faker->randomAscii,
        'status'    => $faker->randomElement(['BUMN']),
        'lain_lain' => $faker->sentence
    ];
});
