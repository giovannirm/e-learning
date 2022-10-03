<?php

use App\Models\Review;
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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->text('comment');
            $table->unsignedTinyInteger('rating');

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('course_id');

            // $table->enum('hlighted', [Review::HLIGHTED, Review::OVERSHADOWED])->default(Review::OVERSHADOWED);
            $table->boolean('hlighted')->default(false);
            // Para indicar que esta calificación ha sido denunciada, el límite máximo de denuncias debe ser de 3
            $table->integer('denounced')->default(Review::REPORTING_LIMIT);
            
            // Si se elimina un usuario o curso, que se eliminen todas sus calificaciones
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

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
        Schema::dropIfExists('reviews');
    }
};
