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
        Schema::create('charge_slips', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('to')->nullable();
            $table->string('from')->nullable();
            $table->string('for')->nullable();
            $table->string('prepared_by')->nullable();
            $table->string('noted_by')->nullable();
            $table->string('author_id')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('vehicle_id')->index();
            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('charge_slips');
    }
};
