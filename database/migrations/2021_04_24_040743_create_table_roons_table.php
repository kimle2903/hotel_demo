<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRoonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('acreage')->default(0);
            $table->bigInteger('hotel_id');
            $table->integer('adult_quantity');
            $table->integer('child_quantity')->default(0)->nullable(true);
            $table->integer('queen_bed')->default(0);
            $table->integer('extra_bed')->default(0)->nullable(true);
            $table->longText('description')->nullable(true);
            $table->double('price');
            $table->double('min_price')->default(0.00);
            $table->tinyInteger('active')->default(1);
            $table->longText('image');
            $table->string('seo_image')->nullable(true);
            $table->string('meta_title')->nullable(true);
            $table->string('meta_description')->nullable(true);
            $table->string('meta_keyword')->nullable(true);
            $table->tinyInteger('unit')->default(1);
            $table->tinyInteger('is_bidding')->default(0);
            $table->double('bidding_min_price')->default(0.00);
            $table->longText('inclusions')->nullable(true);
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
        Schema::dropIfExists('rooms');
    }
}
