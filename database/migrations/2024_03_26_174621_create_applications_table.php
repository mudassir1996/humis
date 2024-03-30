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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string("application_number");
            $table->integer('booking_id');
            $table->string("surname");
            $table->string("given_name");
            $table->enum("gender", ['Male', 'Female']);
            $table->string("father_husband_name");
            $table->string("passport");
            $table->datetime("date_issue");
            $table->datetime("date_expiry");
            $table->datetime("date_birth");
            $table->string("cnic");
            $table->string("blood_group");
            $table->string("fiqah");
            $table->string("marital_status");
            $table->text("address");
            $table->string("mobile_number");
            $table->string("whatsapp_number")->default("");
            $table->string("mehram_name");
            $table->string("mehram_relation");
            $table->string("nominee_name");
            $table->string("nominee_relation");
            $table->string("nominee_cnic");
            $table->string("nominee_mobile");
            $table->string("aziziya_room_sharing")->default("");
            $table->string("makkah_room_sharing")->default("");
            $table->string("madinah_room_sharing")->default("");
            $table->string("qurbani")->default("");
            $table->string("ticket")->default("");
            $table->integer("departure_airport_pk_id");
            $table->integer("departure_airport_ksa_id");
            $table->integer("arrival_airport_pk_id");
            $table->integer("arrival_airport_ksa_id");
            $table->date("arrival_date_ksa");           
            $table->float("cost_per_person");           
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
        Schema::dropIfExists('applications');
    }
};
