<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApartmentAllotment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartmentallotments', function (Blueprint $table) {
            $table->increments('aa_id');
            $table->integer('apartment_id');
            $table->integer('aa_amount_needed');
            $table->integer('aa_amount_paid');
            $table->integer('ir_no');
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
        Schema::drop('apartmentallotment');
    }
}
