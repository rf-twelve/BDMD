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
        Schema::create('charge_slip_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_no')->nullable();
            $table->string('qty')->nullable();
            $table->string('unit')->nullable();
            $table->string('particular')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('total_price')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('charge_slip_id')->index();
            $table->foreign('charge_slip_id')
                ->references('id')
                ->on('charge_slips')
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
        Schema::dropIfExists('charge_slip_items');
    }
};
