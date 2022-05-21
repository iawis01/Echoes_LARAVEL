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
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id_notification');

            $table->unsignedInteger('student_id');
            $table->foreign('student_id')
            ->references('id')->on('users')->onDelete('cascade');

            $table->boolean('work');
            $table->boolean('exam');
            $table->boolean('continuos_assesment');
            $table->boolean('final_note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
