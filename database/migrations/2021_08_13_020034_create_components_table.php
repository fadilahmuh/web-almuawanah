<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->increments('id');
            $table->string('divisi')->nullable(false);
            $table->string('bagian')->nullable(false);
            $table->longText('judul')->nullable();
            $table->string('content')->nullable();
            $table->string('attachment')->nullable();
            $table->boolean("desc1")->nullable();
            $table->unsignedInteger("desc2")->nullable();
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
        Schema::dropIfExists('components');
    }
}
