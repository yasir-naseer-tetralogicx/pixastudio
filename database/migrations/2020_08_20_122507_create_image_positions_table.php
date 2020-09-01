<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_positions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->string("top_left_x");
            $table->string("top_left_y");
            $table->string("bottom_right_x");
            $table->string("bottom_right_y");
            $table->string("crop_width");
            $table->string("crop_height");
            $table->string("img_width");
            $table->string("img_height");
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
        Schema::dropIfExists('image_positions');
    }
}
