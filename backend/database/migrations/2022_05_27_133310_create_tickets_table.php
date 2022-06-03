<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('seat_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('screening_id');
            $table->foreign('screening_id')->references('id')->on('screenings')->onDelete('cascade');
            $table->foreign('seat_id')->references('id')->on('seats');
            $table->foreign('user_id')->references('id')->on('users');
            $table->primary(['seat_id', 'user_id', 'screening_id']);
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
        Schema::dropIfExists('tickets');
    }
};
