<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenelitiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penelitians', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->unsignedBigInteger('peneliti_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('objek_penelitian_id');
            $table->text('uraian');
            $table->string('estimasi', 20);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->foreign('peneliti_id')->references('id')->on('penelitis')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('objek_penelitian_id')->references('id')->on('objek_penelitians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penelitians');
    }
}
