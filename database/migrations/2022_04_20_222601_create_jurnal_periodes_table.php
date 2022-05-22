<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalPeriodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_periodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('jurnal_skema_id')->unsigned();
            $table->string('nama');
            $table->date('periode_mulai');
            $table->date('periode_akhir');
            $table->dateTime('tgl_mulai_reg');
            $table->dateTime('tgl_akhir_reg');
            $table->timestamps();

            $table->foreign('jurnal_skema_id')->references('id')->on('jurnal_skemas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal_periodes');
    }
}
