<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('students')){
        Schema::create('students', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->char('class',30);
            $table->integer('rollno');
            $table->string('image');
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
        Schema::dropIfExists('students');
    }
}
