<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buses', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('busDriver');
            $table->string('busNumber');
            $table->string('DeviceNumber');
            $table->string('DriverPhone');
            $table->string('WifiName');
            $table->string('WifiPass');
            $table->string('password');
            $table->enum('status', ['on', 'off'])->default('off');
            $table->string('MemoryAdres');
            $table->string('DriverId');
            $table->integer('company_id')->unsigned()->index()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
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
        Schema::dropIfExists('buses');
    }
}
