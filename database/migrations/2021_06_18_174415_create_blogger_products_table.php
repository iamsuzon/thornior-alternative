<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloggerProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogger_products', function (Blueprint $table) {
            $table->id();
            $table->integer('blogger_id');
            $table->integer('post_id')->nullable();
            $table->string('post_type')->nullable();
            $table->integer('template_id')->nullable();
            $table->string('product_name');
            $table->longText('product_details');
            $table->string('image');
            $table->string('link');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('blogger_products');
    }
}
