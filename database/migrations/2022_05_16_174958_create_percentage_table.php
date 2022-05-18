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
        Schema::create('percentage', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('course_id');
            $table->unsignedInteger('user_id');

            $table->foreign('course_id')
                ->references('id')->on('courses')->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');
            
                //Pasar dos columnas en un array
                //Si no le pasa el array interpreta el segundo parametro como el nombre del index unico
            $table->unique(array('course_id','user_id'));

            $table->float('continuous_assessment');
            $table->float('exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('percentage');
    }
};
