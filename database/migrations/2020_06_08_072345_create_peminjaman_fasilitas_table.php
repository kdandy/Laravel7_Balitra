<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamanFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjaman_fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('peneliti_id')->onDelete('cascade');
            $table->foreignId('fasilitas_id')->onDelete('cascade');
            $table->string('tujuan_peminjaman', 100);
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('peminjaman_fasilitas');
    }
}
