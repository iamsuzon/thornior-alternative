<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHideUnhidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hide_unhides', function (Blueprint $table) {
            $table->id();
            $table->integer('blogger_id');
            $table->unsignedBigInteger('blog_id');
            $table->boolean('is_page')->nullable();
            $table->boolean('is_section')->nullable();
            $table->string('page_name')->nullable();
            $table->string('section_name')->nullable();
            $table->string('status')->default('active');
            $table->timestamp('modified_at');
            $table->timestamps();

            $table->foreign('blog_id')->references('id')->on('all_blogs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hide_unhides');
    }
}
