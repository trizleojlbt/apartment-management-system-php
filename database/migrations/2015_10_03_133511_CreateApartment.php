<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->increments('apartment_id');
            $table->string('apartment_name');
            $table->string('apartment_num_of_floors');
            $table->string('apartment_num_of_rooms');
            $table->string('apartment_construction_status');
            $table->string('apartment_payment_status');
            $table->string('ir_id')->nullable();
            $table->string('block_id');
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
        Schema::drop('apartments');
    }
}
