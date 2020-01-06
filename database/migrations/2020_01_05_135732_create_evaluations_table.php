<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('evaluation');
            $table->unsignedInteger('students_id');
            $table->unsignedInteger('users_id');
            $table->dateTime('time_submitted');
            $table->timestamps();

            $table->foreign('students_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
}
