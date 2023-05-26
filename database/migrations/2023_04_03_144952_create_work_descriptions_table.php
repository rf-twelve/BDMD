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
        Schema::create('work_descriptions', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('estimated_man_hours')->nullable();
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('work_order_id')->index();
            $table->foreign('work_order_id')
                ->references('id')
                ->on('work_orders')
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
        Schema::dropIfExists('work_descriptions');
    }
};
