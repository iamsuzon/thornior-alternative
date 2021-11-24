<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('collection_id');
            $table->string('collection_slug');
            $table->integer('user_id');
            $table->string('template_type');
            $table->integer('template_id');
            $table->integer('post_id');
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
        Schema::dropIfExists('all_collections');
    }
}
