<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClearanceSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clearance_section', function (Blueprint $table) {
            $table->id();
            $table->foreignId('clearance_id')->references('id')->on('clearance')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->integer('order');
            $table->boolean('follows_order');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clearance_section');
    }
}
