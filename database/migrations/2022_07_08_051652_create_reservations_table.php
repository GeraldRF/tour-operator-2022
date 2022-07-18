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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table-> foreignId ("cliente_id");
            $table-> foreignId ("supplier_id");
            $table-> Integer ("numero_vuelo");
            $table-> Integer ("cantidad_pasajeros");
            $table-> date ("fecha_hora");
            $table-> Integer ("tarifa_servicio");
            $table-> string ("tipo_pago");
            $table-> string ("observaciones");
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
        Schema::dropIfExists('reservations');
    }
};
