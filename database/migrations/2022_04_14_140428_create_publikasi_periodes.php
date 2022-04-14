<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublikasiPeriodes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publikasi_periodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('publikasi_skema_id')->unsigned();
            $table->string('nama');
            $table->date('periode_mulai');
            $table->date('periode_selesai');
            $table->dateTime('tgl_mulai_reg');
            $table->dateTime('tgl_akhir_reg');
            $table->timestamps();

            $table->foreign('publikasi_skema_id')->references('id')->on('publikasi_skemas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publikasi_periodes');
    }
}
