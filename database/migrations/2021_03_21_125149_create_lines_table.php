<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lines', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name');
            $table->string('price');
            $table->string('duration');
            $table->string('startingTime');
            $table->string('image')->nullable();
            $table->enum('status', ['on', 'off'])->default('off');
            $table->integer('jorney_id')->unsigned()->index()->nullable();
            $table->foreign('jorney_id')->references('id')->on('jorneys');
            $table->softDeletes();
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
        Schema::dropIfExists('lines');
    }
}
