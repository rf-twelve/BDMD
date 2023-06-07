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
        Schema::create('machineries', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('brand')->nullable();
            $table->string('serial_no')->nullable();
            $table->string('acquisition_date')->nullable();
            $table->string('acquisition_cost')->nullable();
            $table->string('warranty_expiration')->nullable();
            $table->string('located')->nullable();
            $table->string('remarks')->nullable();
            $table->string('encoder_id')->nullable();
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
        Schema::dropIfExists('machineries');
    }
};
