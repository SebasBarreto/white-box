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
        Schema::create('pedido', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idcliente')->nullable()->index('idcliente');
            $table->string('direccion_envio')->nullable();
            $table->string('telefono_contacto', 20)->nullable();
            $table->enum('estado', ['pendiente', 'en proceso', 'enviado', 'entregado', 'cancelado']);
            $table->enum('metodo_pago', ['tarjeta', 'contra entrega', 'transferencia']);
            $table->decimal('total', 10);
            $table->boolean('pagado');
            $table->timestamp('fecha_pedido')->useCurrent();
            $table->timestamp('fecha_entrega')->nullable();
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
