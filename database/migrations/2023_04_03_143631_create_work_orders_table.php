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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->string('assigned_worker')->nullable();
            $table->string('work_order_no')->nullable();
            $table->string('date_started')->nullable();
            $table->string('date_finished')->nullable();
            $table->string('suppervised_by')->nullable();
            $table->string('suppervised_date')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('approved_date')->nullable();
            $table->string('received_by')->nullable();
            $table->string('received_date')->nullable();
            $table->string('status')->nullable();
            $table->string('author_id')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('maintenance_request_id')->index();
            $table->foreign('maintenance_request_id')
                ->references('id')
                ->on('maintenance_requests')
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
        Schema::dropIfExists('work_orders');
    }
};
