<?php

use App\Models\Offer;
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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('code');
            $table->enum('type', [Offer::PERCENTAGE_DISCOUNT, Offer::FIXED_PRICE]);
            $table->unsignedFloat('value');
            $table->dateTime('start_at');
            $table->dateTime('finish_at');
            $table->boolean('active');
            
            $table->unsignedBigInteger('user_id');

            // Si se elimina un usuario la oferta que creó este usuario debería eliminarse
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
        Schema::dropIfExists('offers');
    }
};
