<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_posts', function (Blueprint $table) {
            $table->id();
            $table->integer('blogger_id');
            $table->integer('template_id');
            $table->string('post_type');
            $table->string('title');
            $table->string('slug');
            $table->string('header1');
            $table->longText('des1');
            $table->longText('editor');
            $table->string('header2');
            $table->longText('des2');
            $table->string('fimage');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->json('colors');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('all_posts');
    }
}
