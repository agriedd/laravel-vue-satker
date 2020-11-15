<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIdBidangOnPimpinan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pimpinan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_bidang');
            $table->foreign('id_bidang')
                ->references('id_bidang')
                ->on('bidang')
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
        Schema::table('pimpinan', function (Blueprint $table) {
            $table->dropForeign('id_bidang');
            $table->dropColumn('id_bidang');
        });
    }
}
