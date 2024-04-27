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
        Schema::create('reciept_vouchers', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->string('reciept_number');
            $table->string('reciept_date');
            $table->string('payment_mode');
            $table->string('bank_account');
            $table->string('check_num');
            $table->string('amount')->default(0);
            $table->string('transaction_charges')->default(0);
            $table->text('amount_in_words');
            $table->string('reciever_name');
            $table->text('attachment');
            $table->integer('created_by');
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
        Schema::dropIfExists('reciept_vouchers');
    }
};
