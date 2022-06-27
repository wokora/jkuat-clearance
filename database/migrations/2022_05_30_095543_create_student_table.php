<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('programme_id')->references('id')->on('programme')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('department_id')->references('id')->on('department')->onUpdate('cascade')->onDelete('cascade');
            $table->string('surname');
            $table->string('first_name');
            $table->string('registration_number')->unique();
            $table->string('email')->unique(); //JKUAT Email
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('student');
    }
}
