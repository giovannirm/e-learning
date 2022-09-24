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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug');
            $table->string('video_url');
            $table->string('video_original_name');
            $table->unsignedTinyInteger('position');
            $table->boolean('published');
            $table->boolean('preview');
            $table->string('poster_url');
            $table->time('duration');
            $table->boolean('processed');

            $table->unsignedBigInteger('platform_id')->nullable();
            $table->unsignedBigInteger('section_id');

            // Si se elimina una plataforma quiero que se seteen a null pero no se eliminen las lecciones
            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('set null');
            // Si se elimina la sección si quiero que se elimine todas las lecciones que forman parte de ella
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

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
        Schema::dropIfExists('lessons');
    }
};
