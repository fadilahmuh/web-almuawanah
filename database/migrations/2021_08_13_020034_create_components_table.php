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
            $table->string('judul')->nullable();
            $table->longText('content')->nullable();
            $table->string('attachment')->nullable();
            $table->string("desc1")->nullable();
            $table->string("desc2")->nullable();
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
