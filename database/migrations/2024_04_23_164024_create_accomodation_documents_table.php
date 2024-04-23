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
        Schema::create('accomodation_documents', function (Blueprint $table) {
            $table->id();
            $table->enum("accomodation_type", ['AZIZIYAH', 'MAKKAH', 'MADINAH']);
            $table->integer('accomodation_id');
            $table->integer('double_capacity');
            $table->integer('triple_capacity');
            $table->integer('quad_capacity');
            $table->integer('five_capacity');
            $table->integer('six_capacity');
            $table->text('attachment');
            $table->integer('company_id');
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
        Schema::dropIfExists('accomodation_documents');
    }
};
