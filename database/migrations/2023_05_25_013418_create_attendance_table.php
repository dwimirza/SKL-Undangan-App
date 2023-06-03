<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->integer('tamu_id')->unsigned();
            $table->integer('acara_id')->unsigned();
            $table->timestamps();
            $table->foreign('tamu_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('acara_id')->references('id')->on('acara')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendance');
    }
}
