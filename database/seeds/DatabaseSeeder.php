<?php

use App\Bidang;
use App\Kegiatan;
use App\Petugas;
use App\Pimpinan;
use App\Satker;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create();
        factory(Satker::class, 1)->create()->each(function($satker){
            factory(Bidang::class, 4)->create([
                'id_satker' => $satker->id_satker
            ])->each(function($bidang){
                factory(Petugas::class, rand(1, 10))->create([
                    'id_bidang' => $bidang->id_bidang
                ]);
                factory(Kegiatan::class, rand(1, 10))->create([
                    'id_bidang' => $bidang->id_bidang
                ]);
            });
        });
    }
}
