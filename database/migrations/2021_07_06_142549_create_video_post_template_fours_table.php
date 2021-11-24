<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoPostTemplateFoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_post_template_fours', function (Blueprint $table) {
            $table->id();
            $table->integer('blogger_id');
            $table->integer('template_id');
            $table->string('post_type');
            $table->integer('post_status')->default(0);
            $table->string('title');
            $table->string('slug');
            $table->string('intro_header')->nullable();
            $table->longText('intro_description')->nullable();
            $table->string('outro_header')->nullable();
            $table->longText('outro_description')->nullable();

            $table->string('headline1')->nullable();
            $table->string('headline2')->nullable();

            $table->string('point_headline_1')->nullable();
            $table->string('point_headline_2')->nullable();
            $table->string('point_headline_3')->nullable();
            $table->string('point_headline_4')->nullable();
            $table->string('point_headline_5')->nullable();
            $table->string('point_headline_6')->nullable();

            $table->longText('description1')->nullable();
            $table->longText('description2')->nullable();

            $table->longText('point_description_1')->nullable();
            $table->longText('point_description_2')->nullable();
            $table->longText('point_description_3')->nullable();
            $table->longText('point_description_4')->nullable();
            $table->longText('point_description_5')->nullable();
            $table->longText('point_description_6')->nullable();

            $table->string('fimage');
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('image3')->nullable();
            $table->string('image4')->nullable();
            $table->string('image5')->nullable();
            $table->string('product_background')->nullable();
            $table->string('video');
            $table->string('color1')->nullable();
            $table->string('color2')->nullable();
            $table->string('color3')->nullable();
            $table->string('color4')->nullable();
            $table->string('color5')->nullable();

            $table->json('product_id')->nullable();

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
        Schema::dropIfExists('video_post_template_fours');
    }
}
