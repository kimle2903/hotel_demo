<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAmenityHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenities_hotel', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hotel_id');$table->foreign('hotel_id')->references('id')->on('hotels');
            $table->unsignedInteger('amenities_id');$table->foreign('amenities_id')->references('id')->on('amenities');
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
        Schema::dropIfExists('amenities_hotel');
    }
}
