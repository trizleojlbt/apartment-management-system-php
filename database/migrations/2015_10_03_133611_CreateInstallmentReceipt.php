<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentReceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installmentreceipts', function (Blueprint $table) {
            $table->string('ir_no')->primary();
            $table->string('ir_paymentmethod');
            $table->date('ir_paymentdate');
            $table->date('ir_dateissued');
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
        Schema::drop('installmentreceipts');
    }
}
