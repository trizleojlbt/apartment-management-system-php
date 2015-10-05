<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceReceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_receipts', function (Blueprint $table) {
            $table->string('mr_no')->primary();
            $table->string('mr_payment_method');
            $table->string('mr_paymentdate');
            $table->string('mr_dateissued');
            $table->string('mb_no');
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
        Schema::drop('maintenance_receipts');
    }
}
