<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { if(!Schema::hasTable('assignments')){
        Schema::create('assignments', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('asgname',60);
            $table->unsignedTinyInteger('teachr_id');
            $table->foreign('teachr_id')->references('id')->on('teachers');
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
        Schema::dropIfExists('assignments');
    }
}
