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
        Schema::create('bill_reports', function (Blueprint $table) {
            $table->id();
            $table->string("rango_fechas");
            $table->foreignId("supplier_id");
            $table->foreignId("bill_id");
            $table->foreignId("vehicle_id");
            $table->foreignId("reservation_id");
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
        Schema::dropIfExists('bill_reports');
    }
};
