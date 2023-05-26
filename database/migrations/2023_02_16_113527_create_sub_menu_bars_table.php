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
        Schema::create('sub_menu_bars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('route');
            $table->string('link');
            $table->string('ordering');
            $table->string('inactive');
            $table->timestamps();
            $table->unsignedBigInteger('menu_bar_id')->index();
            $table->foreign('menu_bar_id')
                ->references('id')
                ->on('menu_bars')
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
        Schema::dropIfExists('sub_menu_bars');
    }
};
