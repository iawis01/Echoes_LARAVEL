<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('user_id');

            $table->unsignedInteger('course_id');
            
            $table->integer('id_schedule');

            $table->string('name');
            $table->string('color');


            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->foreign('course_id')
                ->references('id')->on('courses')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class');
    }
};
