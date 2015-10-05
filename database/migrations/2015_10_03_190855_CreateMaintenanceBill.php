<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceBill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_bills', function (Blueprint $table) {
            $table->string('mb_no')->primary();
            $table->string('mb_item');
            $table->string('mb_num_of_item');
            $table->string('mb_itemcost');
            $table->string('mb_totalamount');
            $table->date('mb_dateissued');
            $table->string('mb_duedate');
            $table->string('owner_id');
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
        Schema::drop('maintenance_bills');
    }
}
