<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_anggotas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jurnal_id');
            $table->integer('tipe')->default(1);
            $table->unsignedBigInteger('dosen_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('identifier')->nullable();
            $table->string('unit')->nullable();
            $table->integer('no_urut')->default(1);
            $table->timestamps();

            $table->foreign('dosen_id')->references('id')->on('dosens');
            $table->foreign('jurnal_id')->references('id')->on('jurnals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal_anggotas');
    }
}
