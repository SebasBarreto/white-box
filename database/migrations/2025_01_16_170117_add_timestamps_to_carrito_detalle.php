<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToCarritoDetalle extends Migration
{
    public function up()
    {
        Schema::table('carrito_detalle', function (Blueprint $table) {
            $table->timestamps(); // Agrega los campos created_at y updated_at
        });
    }

    public function down()
    {
        Schema::table('carrito_detalle', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
