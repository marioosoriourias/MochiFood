<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();

            $table->text('address');
            $table->string('phone')->nullable();
            $table->time('open');
            $table->time('closed');
            $table->string('latitude');
            $table->string('longitude');
             
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('company_id');

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade'); 
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

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
        Schema::dropIfExists('addresses');
    }
}
