<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->integer('iddetalle_ingreso', true);
            $table->integer('idingreso')->index('fk_detalle_ingreso');
            $table->integer('idarticulo')->index('fk_detalle_ingreso_articulo');
            $table->integer('cantidad');
            $table->decimal('precio_compra', 11);
            $table->decimal('precio_venta', 11);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ingreso');
    }
};
