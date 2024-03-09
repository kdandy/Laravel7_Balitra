<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_penilaians', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->unsignedBigInteger('penilaian_id');
            $table->unsignedBigInteger('penelitian_id');
            $table->integer('nilai');
            $table->foreign('penilaian_id')->references('id')->on('penilaians')->onDelete('cascade');
            $table->foreign('penelitian_id')->references('id')->on('penelitians')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hasil_penilaians');
    }
}
