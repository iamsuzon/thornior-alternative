<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('blogger_id');
            $table->string('blog_name')->unique('blog_name');
            $table->string('blog_slug')->unique('blog_slug');
            $table->longText('blog_description')->nullable();
            $table->string('region');
            $table->string('avg_post');
            $table->json('categories');
            $table->string('image')->nullable();
            $table->string('blog_status')->default('published');
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
        Schema::dropIfExists('all_blogs');
    }
}
