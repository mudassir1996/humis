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
        Schema::create('accomodations', function (Blueprint $table) {
            $table->id();
            $table->string("hotel_name");
            $table->enum("accomodation_type", ['AZIZIYAH', 'MAKKAH', 'MADINAH']);
            $table->float("sharing_room_cost");
            $table->float("triple_room_cost");
            $table->float("quad_double_cost");
            $table->enum("hotel_status", ['ACTIVE', 'INACTIVE']);
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
        Schema::dropIfExists('accomodations');
    }
};
