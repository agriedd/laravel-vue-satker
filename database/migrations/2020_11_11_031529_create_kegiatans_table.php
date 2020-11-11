<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->id('id_kegiatan');
            $table->timestamps();

            $table->unsignedBigInteger('id_bidang');
            $table->date('tanggal');
            $table->text('rincian_kegiatan');
            $table->string('lokasi');
            $table->string('nama_kegiatan');
            
            $table->foreign('id_bidang')
                ->references('id_bidang')
                ->on('bidang')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatan');
    }
}
