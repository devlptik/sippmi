<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublikasiReviewers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publikasi_reviewers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('publikasi_id');
            $table->unsignedInteger('reviewer_id');
            $table->text('komentar')->nullable();
            $table->integer('reviewed')->default(0);
            $table->dateTime('review_at')->nullable();
            $table->timestamps();

            $table->foreign('publikasi_id')->references('id')->on('publikasis');
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
        Schema::dropIfExists('publikasi_reviewers');
    }
}
