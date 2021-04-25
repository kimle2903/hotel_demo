<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFacilityRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facilities_roon', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('facilities_id');$table->foreign('facilities_id')->references('id')->on('facilities');
            $table->unsignedInteger('roon_id');
            $table->foreign('roon_id')->references('id')->on('rooms');
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
        Schema::dropIfExists('facilities_roon');
    }
}
