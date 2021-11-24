<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->integer('blogger_id');
            $table->integer('template_id');
            $table->string('post_type');
            $table->integer('post_status')->default(0);
            $table->string('title');
            $table->string('slug');

            $table->string('intro_heading')->nullable();
            $table->longText('intro_description')->nullable();
            $table->string('outro_heading')->nullable();
            $table->longText('outro_description')->nullable();

            $table->string('last_heading')->nullable();
            $table->longText('last_description')->nullable();

            $table->string('headline1')->nullable();
            $table->string('headline2')->nullable();
            $table->string('headline3')->nullable();
            $table->string('headline4')->nullable();
            $table->string('headline5')->nullable();
            $table->string('headline6')->nullable();
            $table->longText('description1')->nullable();
            $table->longText('description2')->nullable();
            $table->longText('description3')->nullable();
            $table->longText('description4')->nullable();
            $table->longText('description5')->nullable();
            $table->longText('description6')->nullable();

            $table->string('point_heading_1')->nullable();
            $table->string('point_heading_2')->nullable();
            $table->string('point_heading_3')->nullable();
            $table->string('point_heading_4')->nullable();
            $table->string('point_heading_5')->nullable();
            $table->string('point_heading_6')->nullable();

            $table->longText('point_description_1')->nullable();
            $table->longText('point_description_2')->nullable();
            $table->longText('point_description_3')->nullable();
            $table->longText('point_description_4')->nullable();
            $table->longText('point_description_5')->nullable();
            $table->longText('point_description_6')->nullable();

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
        Schema::dropIfExists('images');
    }
}
