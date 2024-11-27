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
        Schema::table('carrito_detalle', function (Blueprint $table) {
            $table->foreign(['idcarrito'], 'carrito_detalle_ibfk_1')->references(['id'])->on('carrito')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['idproducto'], 'carrito_detalle_ibfk_2')->references(['id'])->on('producto')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carrito_detalle', function (Blueprint $table) {
            $table->dropForeign('carrito_detalle_ibfk_1');
            $table->dropForeign('carrito_detalle_ibfk_2');
        });
    }
};
