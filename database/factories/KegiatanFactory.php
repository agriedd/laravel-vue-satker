<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kegiatan;
use Faker\Generator as Faker;

$factory->define(Kegiatan::class, function (Faker $faker) {
    return [
        'rincian_kegiatan'  => $faker->paragraph,
        'lokasi'            => $faker->city,
        'nama_kegiatan'     => 'Kegiatan '.$faker->city,
        'tanggal'           => $faker->date()
    ];
});
