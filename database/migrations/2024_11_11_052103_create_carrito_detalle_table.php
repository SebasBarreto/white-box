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
        Schema::create('carrito_detalle', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idcarrito')->nullable()->index('idcarrito');
            $table->integer('idproducto')->nullable()->index('idproducto');
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 10);
            $table->decimal('subtotal', 10)->nullable()->storedAs('`cantidad` * `precio_unitario`');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_detalle');
    }
};
