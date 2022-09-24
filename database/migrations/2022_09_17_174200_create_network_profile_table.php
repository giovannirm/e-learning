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
        Schema::create('network_profile', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('network_id');
            $table->unsignedBigInteger('profile_id');

            $table->string('link');
            
            $table->foreign('network_id')->references('id')->on('networks');
            $table->foreign('profile_id')->references('id')->on('profiles');
            
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
        Schema::dropIfExists('network_profile');
    }
};
