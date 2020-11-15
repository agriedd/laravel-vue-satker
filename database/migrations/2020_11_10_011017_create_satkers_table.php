<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSatkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('satker_1', function (Blueprint $table) {
            $table->id('id_satker');
            $table->timestamps();

            $table->string('nama');
            $table->string('nama_pimpinan');
            $table->string('alamat');
            $table->string('iso');
            $table->string('status');
            $table->text('lain_lain')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('satker_1');
    }
}
