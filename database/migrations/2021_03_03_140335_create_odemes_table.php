<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odemes', function (Blueprint $table) {
            $table->Increments('id');

            $table->integer('bus_id')->unsigned()->index()->nullable();
            $table->foreign('bus_id')->references('id')->on('buses');
            $table->string('amount');
            $table->string('Description');
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
        Schema::dropIfExists('odemes');
    }
}
