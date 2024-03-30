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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string("booking_number");
            $table->integer('company_id');
            $table->integer('booking_office_id');
            $table->string("client_country");
            $table->string("booking_nature");
            $table->string("agent_name")->default("");
            $table->float("agent_commission")->default(0.00);
            $table->integer("num_of_hujjaj");
            $table->enum("companion", ['Individual', 'Family']);
            $table->string("contact_name")->default("");
            $table->string("contact_surname")->default("");
            $table->string("contact_mobile")->default("");
            $table->enum("package_type", ['STANDARD', 'CUSTOM']);
            $table->integer("package_id");
            $table->string("booking_status")->default("");
            $table->float("discount");
            $table->float("net_total");
            $table->float("commission");
            $table->float("grand_total");
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
        Schema::dropIfExists('bookings');
    }
};
