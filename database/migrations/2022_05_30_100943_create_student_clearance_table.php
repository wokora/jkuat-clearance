<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClearanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_clearance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_clearance_status_id')->references('id')->on('student_clearance_status')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('student_id')->references('id')->on('student')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('clearance_id')->references('id')->on('clearance')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('student_clearance');
    }
}
