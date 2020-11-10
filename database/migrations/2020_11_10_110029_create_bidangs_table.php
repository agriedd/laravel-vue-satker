<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang', function (Blueprint $table) {
            $table->id('id_bidang');
            $table->timestamps();
            $table->unsignedBigInteger('id_satker');
            $table->string('nama_kepala_b');
            $table->string('nama_bidang');
            $table->text('visi_misi');
            $table->text('tujuan');

            $table->foreign('id_satker')
                ->references('id_satker')
                ->on('satker_1')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidang');
    }
}
