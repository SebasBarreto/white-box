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
        Schema::create('envios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idpedido')->nullable()->index('idpedido');
            $table->string('empresa_envio', 100)->nullable();
            $table->enum('metodo_envio', ['standard', 'express', 'retiro en tienda'])->nullable();
            $table->decimal('costo_envio', 10);
            $table->timestamp('fecha_envio')->nullable()->useCurrent();
            $table->timestamp('fecha_estimada_entrega')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envios');
    }
};
