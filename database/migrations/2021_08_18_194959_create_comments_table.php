<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('template_type');
            $table->integer('template_id');
            $table->unsignedBigInteger('video_id')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->string('user_type');
            $table->integer('user_id');
            $table->integer('post_owner_id');
            $table->longText('comment');
            $table->timestamps();

            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('image_id')->references('id')->on('images')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
