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
            ]);
        });
        $bidangs = Bidang::all();
        foreach($bidangs as $bidang){
            switch($bidang->nama_bidang){
                case "PPK Air Minum":
                default:
                    $bidang->nama_kepala_b = "Magdalena D. Yunita, ST";
                    $bidang->save(); 
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Magdalena D. Yunita, ST",
                        'nip'       => "19810629 201012 2 002",
                        'pangkat'   => "Kepala PPK Air Minum",
                        'status'    => 'PNS',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Hans A. Adoe",
                        'nip'       => "19790925 201412 1 002",
                        'pangkat'   => "Petugas Teknik",
                        'status'    => 'PNS',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Mediana A. Toepoe, S.Sos",
                        'nip'       => "NRP. E15071981062018003",
                        'pangkat'   => "Pengelola Keuangan",
                        'status'    => 'Kontrak',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Debi Polin",
                        'nip'       => "NRP. E20121984062018001",
                        'pangkat'   => "Pengadministrasian Umum",
                        'status'    => 'Kontrak',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Hermayono Benu",
                        'nip'       => "NRP. E04031991062018002",
                        'pangkat'   => "Pengadministrasian Umum",
                        'status'    => 'Kontrak',
                        'id_bidang' => $bidang->id_bidang
                    ]);

                    factory(Kegiatan::class, 1)->create([
                        'rincian_kegiatan'  => 'OPTIMALISASI SPAM IKK SEMAU KABUPATEN KUPANG',
                        'lokasi'            => 'SEMAU KABUPATEN KUPANG, Koordinat Reservoir 50 m3 E.10°09.890` S.123°26.915` Elevasi 120 M/dpl',
                        'nama_kegiatan'     => 'OPTIMALISASI SPAM IKK SEMAU KABUPATEN KUPANG',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Kegiatan::class, 1)->create([
                        'rincian_kegiatan'  => 'OPTIMALISASI SPAM IKK TOBUKABUPATEN TIMOR TENGAH SELATAN',
                        'lokasi'            => 'TOBUKABUPATEN TIMOR TENGAH SELATAN, Koordinat Reservoir 200 m3 E.124°15`51.28`` S.9°38`49.17``
                        Elevasi 1.306 M/dpl ',
                        'nama_kegiatan'     => 'OPTIMALISASI SPAM IKK TOBUKABUPATEN TIMOR TENGAH SELATAN',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Kegiatan::class, 1)->create([
                        'rincian_kegiatan'  => 'OPTIMALISASI SPAM KAWASAN RAWAN AIR DI KECAMATAN ROTE TIMUR KABUPATEN ROTE NDAO',
                        'lokasi'            => 'KECAMATAN ROTE TIMUR KABUPATEN ROTE NDAO, Koordinat Reservoir 200 m3 E.123°17`59.07`` S.10°38`29.66`` Elevasi 90 M/dpl`` Elevasi 1.306 M/dpl',
                        'nama_kegiatan'     => 'OPTIMALISASI SPAM KAWASAN RAWAN AIR DI KECAMATAN ROTE TIMUR KABUPATEN ROTE NDAO',
                        'id_bidang' => $bidang->id_bidang
                    ]);

                    break;
                case "PPK PKP":
                    $bidang->nama_kepala_b = "Dika Dwi Angga, ST";
                    $bidang->save();
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Dika Dwi Angga, ST",
                        'nip'       => "199005072014021001",
                        'pangkat'   => "Kepala PPK PKP",
                        'status'    => 'PNS',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Faiz Imaduddin, Amd",
                        'nip'       => "199605112011821001",
                        'pangkat'   => "Penata Teknik",
                        'status'    => 'PNS',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Alysa Tatia Dami, ST",
                        'nip'       => "NRP. E03031991062018001",
                        'pangkat'   => "Penata Teknik",
                        'status'    => 'Kontrak',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Damaris Ello",
                        'nip'       => "19651215 200212 2 001",
                        'pangkat'   => "Pengadministrasian Umum",
                        'status'    => 'PNS',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Kanisius Fallo",
                        'nip'       => "NRP. E08021974062018001",
                        'pangkat'   => "Pengadministrasian Umum",
                        'status'    => 'Kontrak',
                        'id_bidang' => $bidang->id_bidang
                    ]);

                    factory(Kegiatan::class, 1)->create([
                        'rincian_kegiatan'  => 'REHABILITASI DAN RENOVASI SARANA PRASARANA SEKOLAH KABUPATEN TIMOR TENGAH SELATAN I',
                        'lokasi'            => 'KABUPATEN TIMOR TENGAH SELATAN',
                        'nama_kegiatan'     => 'REHABILITASI DAN RENOVASI SARANA PRASARANA SEKOLAH KABUPATEN TIMOR TENGAH SELATAN I',
                        'id_bidang' => $bidang->id_bidang
                    ]);


                    break;
                case "PPK PSP POP Dan PBL":
                    $bidang->nama_kepala_b = "Nyoman Ary Yudia Prawira, ST";
                    $bidang->save();
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Nyoman Ary Yudia Prawira, ST",
                        'nip'       => "19791229 200801 1 020",
                        'pangkat'   => "Kepala PPK PSP POP Dan PBL",
                        'status'    => 'PNS',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Fajar Pratama, ST",
                        'nip'       => "198904102018021001",
                        'pangkat'   => "Pelaksana Teknik",
                        'status'    => 'PNS',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Yosep Beda Wotan, ST",
                        'nip'       => "NRP. E06081987062018002",
                        'pangkat'   => "Penata Teknik",
                        'status'    => 'Kontrak',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Yoachim G. Yuven, ST",
                        'nip'       => "NRP. E14031989062018001",
                        'pangkat'   => "Penata Teknik",
                        'status'    => 'Kontrak',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    
                    factory(Kegiatan::class, 1)->create([
                        'rincian_kegiatan'  => 'REHABILITASI DAN RENOVASI MADRASAH KAB. TIMOR TENGAH SELATANMIN Oeue Kab. TTS',
                        'lokasi'            => 'TIMOR TENGAH SELATANMIN Oeue Kab. TTS',
                        'nama_kegiatan'     => 'REHABILITASI DAN RENOVASI MADRASAH KAB. TIMOR TENGAH SELATANMIN Oeue Kab. TTS',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    break;
                case "PPK Pengembangan PLP":
                    $bidang->nama_kepala_b = "Hendro Ndolu, ST";
                    $bidang->save();
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Hendro Ndolu, ST",
                        'nip'       => "19870317 201101 1 006",
                        'pangkat'   => "Kepala PPK Pengembangan PLP",
                        'status'    => 'PNS',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Philip J. Dethan, ST",
                        'nip'       => "NRP. E14011989062018001",
                        'pangkat'   => "Penata Teknik",
                        'status'    => 'Kontrak',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    factory(Petugas::class, 1)->create([
                        'nama'      => "Novianto Benu, SE",
                        'nip'       => "NRP. E28111989062018002",
                        'pangkat'   => "Pengelola Keuangan",
                        'status'    => 'Kontrak',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    
                    factory(Kegiatan::class, 1)->create([
                        'rincian_kegiatan'  => 'REHABILITASI STADION OEPOI KOTA KUPANG',
                        'lokasi'            => 'OEPOI KOTA KUPANG',
                        'nama_kegiatan'     => 'REHABILITASI STADION OEPOI KOTA KUPANG',
                        'id_bidang' => $bidang->id_bidang
                    ]);
                    break;
            }
        }
    }
}
