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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string("package_name");
            $table->integer("maktab_category_id");
            $table->string("duration_of_stay");
            $table->enum("nature",['FIX', 'SHIFTING']);
            $table->integer("aziziya_accommodation_id");
            $table->integer("makkah_accommodation_id");
            $table->integer("madinah_accommodation_id");
            $table->enum("aziziya_room_sharing",['SHARING', 'TRIPLE','DOUBLE']);
            $table->enum("makkah_room_sharing",['SHARING', 'TRIPLE','DOUBLE']);
            $table->enum("madinah_room_sharing",['SHARING', 'TRIPLE','DOUBLE']);
            $table->integer("food_type_id");
            $table->enum("special_transport",['INCLUDED','NOT_INCLUDED']);
            $table->enum("package_status",['ACTIVE','INACTIVE']);
            $table->string("cost_per_person")->default(0);
            $table->integer("created_by");
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
        Schema::dropIfExists('packages');
    }
};
