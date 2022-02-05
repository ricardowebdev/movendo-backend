<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('rentals');

        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userId');
            $table->foreignId('movieId');
            $table->double('rentalDays');
            $table->boolean('returned');
            $table->timestamps();
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('movieId')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
