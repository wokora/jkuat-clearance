<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserClearanceSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_clearance_section', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_clearance_id')->references('id')->on('user_clearance')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('clearance_section_id')->references('id')->on('clearance_section')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('user_clearance_section');
    }
}
