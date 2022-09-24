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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();

            // Si hay cupones negativos podrían pedir devolución de dinero
            $table->unsignedFloat('price');
            $table->dateTime('start_at');
            $table->dateTime('finish_at');
            $table->string('code');
            $table->unsignedTinyInteger('quantity');

            $table->unsignedBigInteger('course_id');

            // Si se elimina el curso donde se han generado cupones, también deberían eliminarse los cupones
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
        Schema::dropIfExists('coupons');
    }
};
