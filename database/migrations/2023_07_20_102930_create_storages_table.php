<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->string('location');
            $table->string('title');
            $table->text('description');
            $table->float('space');
            $table->boolean('indoor'); //or openspace
            $table->float('height');
            $table->boolean('floor'); //or ground
            $table->integer('floor_number');
            $table->float('daily_price');
            $table->boolean('month_discount');
            $table->float('discount');
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
        Schema::dropIfExists('storages');
    }
};
