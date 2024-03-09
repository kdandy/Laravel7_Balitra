<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobdesksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobdesks', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('penelitian_id')->onDelete('cascade');
            $table->text('uraian');
            $table->date('batas_pengerjaan');
            $table->tinyInteger('status')->default(0);
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('jobdesks');
    }
}
