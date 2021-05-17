<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_video', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('video_id');
            $table->timestamps();


//            CATEGORY FOREIGN
            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->onDelete('no action');

            //            VIDEO FOREIGN
            $table->foreign('video_id')
                ->on('videos')
                ->references('id')
                ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_video');
    }
}
