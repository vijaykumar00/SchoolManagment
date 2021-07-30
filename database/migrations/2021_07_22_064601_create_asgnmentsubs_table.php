<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsgnmentsubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('asgnmentsubs')){
        Schema::create('asgnmentsubs', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('asg_id');
            $table->foreign('asg_id')->references('id')->on('assignments');
            $table->unsignedTinyInteger('student_id');
            $table->foreign('student_id')->references('id')->on('students');
            $table->string('document');
            $table->char('grades',2);
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asgnmentsubs');
    }
}
