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
        Schema::create('lesson_user', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('user_id');

            // Si se elimina una lección quiero que se eliminen su registro de completado
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            // Si se elimina un usuario quiero que se eliminen su registro de completado
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_user');
    }
};
