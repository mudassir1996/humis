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
        Schema::create('maktab_categories', function (Blueprint $table) {
            $table->id();
            $table->string("maktab_name");
            $table->string("maktab_cost")->default(0);
            $table->enum("maktab_status",['ACTIVE','INACTIVE']);
            $table->string("profit")->default(0);
            $table->string("ksa_expense")->default(0);
            $table->string("pk_expense")->default(0);
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
        Schema::dropIfExists('maktab_categories');
    }
};
