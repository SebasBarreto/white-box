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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idpedido')->nullable()->index('idpedido');
            $table->decimal('monto', 10);
            $table->enum('estado', ['completada', 'pendiente', 'cancelada']);
            $table->enum('metodo_pago', ['tarjeta', 'transferencia', 'efectivo']);
            $table->timestamp('fecha')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};
