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
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id();
            $table->string('priority_type')->nullable();
            $table->string('last_repair_date')->nullable();
            $table->string('last_repair_nature')->nullable();
            $table->string('defects')->nullable();
            $table->string('requested_by')->nullable();
            $table->string('requested_date')->nullable();
            $table->string('received_by')->nullable();
            $table->string('received_date')->nullable();
            $table->string('inspected_by')->nullable();
            $table->string('inspected_date')->nullable();
            $table->string('comments')->nullable();
            $table->string('parts_needed')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('approved_date')->nullable();
            $table->string('work_completed_on')->nullable();
            $table->string('status')->nullable();
            $table->string('author_id')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('vehicle_id')->index();
            $table->unsignedBigInteger('work_order_id')->index();
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
        Schema::dropIfExists('maintenance_requests');
    }
};
