<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bidang;
use Faker\Generator as Faker;

$factory->define(Bidang::class, function (Faker $faker) {
    return [
        'nama_kepala_b' => $faker->name(),
        'nama_bidang'   => $faker->citySuffix,
        'visi_misi'     => $faker->paragraph,
        'tujuan'        => $faker->randomHtml(),
    ];
});
