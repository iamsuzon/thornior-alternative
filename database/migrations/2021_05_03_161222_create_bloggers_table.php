<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloggers', function (Blueprint $table) {
            $table->id();
            $table->integer('bid')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->longText('about')->nullable();
            $table->string('region')->nullable();
            $table->integer('role_id');
            $table->integer('is_approved')->default(0);
            $table->integer('has_blog')->default(0);
            $table->string('image')->default('user.jpg');
            $table->rememberToken();
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
        Schema::dropIfExists('bloggers');
    }
}
