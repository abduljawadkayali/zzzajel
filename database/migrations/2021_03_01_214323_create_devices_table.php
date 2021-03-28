<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('SalerName');
            $table->string('DeviceNumber');
            $table->string('Adres');
            $table->string('SalerPhone');
            $table->string('WifiName');
            $table->string('WifiPass');
            $table->string('password');
            $table->enum('status', ['on', 'off'])->default('off');
            $table->string('MemoryAdres');
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
        Schema::dropIfExists('devices');
    }
}
