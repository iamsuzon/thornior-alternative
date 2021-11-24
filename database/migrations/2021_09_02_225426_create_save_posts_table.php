<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('save_posts', function (Blueprint $table) {
            $table->id();
            $table->string('template_type');
            $table->integer('template_id');
            $table->integer('post_id');
            $table->string('user_type');
            $table->integer('user_id');
            $table->integer('post_user_id');
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
        Schema::dropIfExists('save_posts');
    }
}
