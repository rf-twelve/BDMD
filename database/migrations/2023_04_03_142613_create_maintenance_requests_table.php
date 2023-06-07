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
            $table->string('class')->nullable();
            $table->string('class_id')->nullable();
            $table->string('for')->nullable();
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
        Schema::dropIfExists('maintenance_requests');
    }
};
