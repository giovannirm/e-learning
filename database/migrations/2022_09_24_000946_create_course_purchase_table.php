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
        Schema::create('course_purchase', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('purchase_id');
            $table->unsignedBigInteger('course_id');

            $table->unsignedFloat('price_paid');
            $table->unsignedFloat('transaction_fee');
            $table->unsignedFloat('net_amount');
            $table->unsignedFloat('total_to_paid');
            $table->string('cupon_code');
            $table->string('offer_code');


            $table->foreign('purchase_id')->references('id')->on('purchases');
            $table->foreign('course_id')->references('id')->on('courses');

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
        Schema::dropIfExists('course_purchase');
    }
};
