<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPenelitiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_penelitians', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('penelitian_id')->onDelete('cascade');
            $table->string('judul', 100);
            $table->tinyInteger('status')->default(0);
            $table->string('catatan', 100)->nullable();
            $table->string('file')->nullable();
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
        Schema::dropIfExists('hasil_penelitians');
    }
}
