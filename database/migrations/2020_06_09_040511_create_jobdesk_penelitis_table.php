<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobdeskPenelitisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobdesk_penelitis', function (Blueprint $table) {
            $table->id();
            $table->string('uuid', 36);
            $table->foreignId('jobdesk_id')->onDelete('cascade');
            $table->text('uraian');
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
        Schema::dropIfExists('jobdesk_penelitis');
    }
}
