<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('compras', function (Blueprint $table) {
        $table->id(); // ID de la compra
        $table->unsignedBigInteger('cliente_id'); // Relación con cliente
        $table->unsignedBigInteger('producto_id'); // Relación con producto
        $table->integer('cantidad'); // Cantidad del producto comprado
        $table->decimal('total', 10, 2); // Total de la compra
        $table->timestamp('fecha_compra'); // Fecha de la compra
        $table->timestamps(); // created_at y updated_at

        // Relaciones
        $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('cascade');
        $table->foreign('producto_id')->references('id')->on('producto')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('compras');
}

};
