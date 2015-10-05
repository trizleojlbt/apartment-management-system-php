<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->string('owner_id')->primary();
            $table->string('owner_lastname');
            $table->string('owner_firstname');
            $table->string('owner_middlename')->nullable();
            $table->string('owner_gender');
            $table->date('owner_birthdate');
            $table->string('owner_address');
            $table->string('owner_nationality');
            $table->string('owner_telephone');
            $table->string('owner_username');
            $table->string('owner_password');
            $table->string('owner_email');
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
        Schema::drop('owners');
    }
}
