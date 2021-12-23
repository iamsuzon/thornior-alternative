<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_views', function (Blueprint $table) {
            $table->id();
            $table->integer('blogger_id');
            $table->integer('blog_id');
            $table->ipAddress('ip_address');
            $table->string('session_id');
            $table->string('agent');
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
        Schema::dropIfExists('blog_views');
    }
}
