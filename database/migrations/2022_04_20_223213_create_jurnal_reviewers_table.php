<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalReviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal_reviewers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jurnal_id');
            $table->unsignedInteger('reviewer_id');
            $table->text('komentar')->nullable();
            $table->integer('reviewed')->default(0);
            $table->dateTime('review_at')->nullable();
            $table->timestamps();

            $table->foreign('jurnal_id')->references('id')->on('jurnals');
            $table->foreign('reviewer_id')->references('id')->on('reviewers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal_reviewers');
    }
}
