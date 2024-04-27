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
        Schema::table('maktab_categories', function (Blueprint $table) {
            $table->string('special_transport')->default(0);
            $table->string('agent_commission')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('maktab_categories', function (Blueprint $table) {
            $table->dropColumn('special_transport');
            $table->dropColumn('agent_commission');
        });
    }
};
