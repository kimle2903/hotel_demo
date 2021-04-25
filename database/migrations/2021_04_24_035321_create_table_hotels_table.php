<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('merchant_id');
            $table->string('name');
            $table->string('slug');
            $table->string('location');
            $table->text('image');
            $table->integer('star');
            $table->longText('description')->nullable(true);
            $table->time('rules_checkin')->nullable(true);
            $table->time('rules_checkout')->nullable(true);
            $table->longText('rules_description')->nullable(true);
            $table->string('seo_image')->nullable(true);
            $table->string('meta_title')->nullable(true);
            $table->string('meta_description')->nullable(true);
            $table->string('meta_keyword')->nullable(true);
            $table->double('avg_rate');
            $table->double('min_price');
            $table->integer('active')->default(1);
            $table->string('hotelId')->nullable(true);;
            $table->string('productId')->nullable(true);;
            $table->string('currency')->nullable(true);;
            $table->longText('inclusions')->nullable(true);;

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
        Schema::dropIfExists('hotels');
    }
}
