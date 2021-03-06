<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title', 191);
            $table->text('description');
            $table->boolean('seen')->default(null)->nullable();
            $table->string('link')->nullable()->default(null);
            $table->timestamps();

            //            USER FOREIGN
            $table->foreign('user_id')
                ->on('users')
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
        Schema::dropIfExists('video_requests');
    }
}
