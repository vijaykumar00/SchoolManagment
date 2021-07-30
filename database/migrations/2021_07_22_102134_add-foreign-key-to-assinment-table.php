<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToAssinmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    if(!Schema::hasColumn('assignments','subject_id')){
        Schema::table('assignments', function (Blueprint $table) {
            $table->unsignedTinyInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
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
        Schema::table('assignments', function (Blueprint $table) {
            $table->dropColumn('subject_id');
        });
    }
}
