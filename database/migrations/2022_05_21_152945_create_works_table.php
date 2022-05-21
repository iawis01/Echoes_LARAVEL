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
        Schema::create('works', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('class_id');
            $table->unsignedInteger('user_id');

            $table->foreign('class_id')
                ->references('id_class')->on('classes')->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');

            $table->string('name');
            $table->float('mark');

            $table->timestamps();



            //Si la clave primaria de todas las claves hasta ahora
            //fuese id se podría hacer:
            /*
            $table->foreignId('id_class')
                ->nullable()
                ->constrained('classes')
                ->cascadeOnUpdate()
                ->nullOnDelete();*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
};
