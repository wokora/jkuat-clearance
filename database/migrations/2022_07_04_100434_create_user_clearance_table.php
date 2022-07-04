<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserClearanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_clearance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('user')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('user_clearance');
    }
}
