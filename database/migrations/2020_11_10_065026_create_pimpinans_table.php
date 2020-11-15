<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePimpinansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pimpinan', function (Blueprint $table) {
            $table->id('id_pimpinan');
            $table->timestamps();
            $table->string('nip')->nullable();
            $table->string('nama');
            $table->string('password');
            $table->string('pangkat');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('api_token')->nullable();
            $table->string('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pimpinan');
    }
}
