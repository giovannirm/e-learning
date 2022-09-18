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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            // Estos atributos se le asignarán al usuario profesor solo cuando este tenga ese rol asignado
            $table->string('title')->nullable();
            $table->text('biography')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();

            $table->unsignedBigInteger('user_id');
            
            // Cuando el usuario se elimine, debería borrar todo su perfil
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
        Schema::dropIfExists('profiles');
    }
};
