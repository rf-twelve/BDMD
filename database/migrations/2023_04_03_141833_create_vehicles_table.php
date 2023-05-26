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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('make')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->string('plate_no')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('acquisition_date')->nullable();
            $table->string('acquisition_cost')->nullable();
            $table->string('remarks')->nullable();
            $table->string('is_vehicle')->nullable();
            $table->string('author_id')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
};
