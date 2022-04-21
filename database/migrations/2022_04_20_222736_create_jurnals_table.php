<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('judul');
            $table->text('abstract')->nullable();
            $table->unsignedBigInteger('jurnal_skema_id');
            $table->unsignedInteger('pengusul_id');
            $table->integer('status_usulan')->default(0);
            $table->integer('luaran_id')->default(1); //Penelitian // Pengabdian
            $table->integer('volume')->nullable();
            $table->integer('nomor')->nullable();
            $table->integer('hal_awal')->nullable();
            $table->integer('hal_akhir')->nullable();
            $table->string('doi')->nullable();
            $table->date('tgl_terbit')->nullable();
            $table->unsignedBigInteger('jurnal_periode_id');
            $table->string('link')->nullable();
            $table->string('file_artikel')->nullable();

            $table->string('nama_jurnal');
            $table->string('issn');
            $table->string('cakupan_bidang');
            $table->text('alamat')->nullable();
            $table->text('impact_factor')->nullable();
            $table->text('h_index')->nullable();

            $table->timestamps();

            $table->foreign('pengusul_id')->references('id')->on('dosens');
            $table->foreign('jurnal_skema_id')->references('id')->on('jurnal_skemas');
            $table->foreign('jurnal_periode_id')->references('id')->on('jurnal_periodes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnals');
    }
}
