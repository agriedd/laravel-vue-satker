<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasTable extends Migration{

    public function up(){
        Schema::create('petugas', function (Blueprint $table) {
            $table->id('id_petugas');
            $table->timestamps();

            $table->string('nama');
            $table->string('nip');
            $table->string('pangkat');
            $table->string('status');
            $table->text('alamat')->nullable();

            $table->unsignedBigInteger('id_bidang');
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
        Schema::dropIfExists('petugas');
    }
}
