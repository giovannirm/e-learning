<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Course;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->string('subtitle');
            $table->text('description');
            $table->string('image_url');
            $table->string('video_url');
            $table->text('welcome_message');
            $table->text('goodbye_message');
            $table->text('observation');
            $table->string('referral_code');
            $table->enum('status', [Course::BORRADOR, Course::REVISION, Course::PUBLICADO])->default(Course::BORRADOR);
            $table->dateTime('published_at');

            $table->unsignedBigInteger('user_id');
            // Permitimos valores nulos, en caso de que se elimine se setee a null
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();
            
            // Este usuario hace referencia al usuario que creó el curso
            // Si el usuario que creó el curso se da de baja, sería bueno que todo sus cursos publicados se eliminen
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // Si un nivel, categoría o precio se elimina se setea el valor de null ya que si es cascade se eliminaría hasta el curso
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('set null');

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
        Schema::dropIfExists('courses');
    }
};
