<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_video', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('video_id');
            $table->timestamps();


            //            TAG FOREIGN
            $table->foreign('tag_id')
                ->on('tags')
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
        Schema::dropIfExists('tag_video');
    }
}
