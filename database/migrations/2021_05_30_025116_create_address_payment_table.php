<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_payment', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('address_id');
            $table->unsignedBigInteger('payment_id');

            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');   
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');

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
        Schema::dropIfExists('address_payment');
    }
}
