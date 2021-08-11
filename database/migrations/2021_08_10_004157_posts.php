<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Posts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul')->nullable(false);
            $table->string('slug')->unique();
            $table->longText('content')->nullable();
            $table->string('tag')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean("is_published")->nullable(false);
            $table->unsignedInteger("users_id")->index();
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
        Schema::dropIfExists('posts');
    }
}
