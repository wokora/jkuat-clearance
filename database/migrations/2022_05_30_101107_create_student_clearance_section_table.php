<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClearanceSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_clearance_step', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_clearance_id')->references('id')->on('student_clearance')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('clearance_section_status_id')->references('id')->on('clearance_section_status')->onUpdate('cascade')->onDelete('cascade');
            $table->string('remarks');
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
        Schema::dropIfExists('student_clearance_step');
    }
}
