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
        Schema::table('detalle_venta', function (Blueprint $table) {
            $table->foreign(['idventa'], 'fk_detalle_venta')->references(['idventa'])->on('venta')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idarticulo'], 'fk_detalle_venta_articulo')->references(['idarticulo'])->on('articulo')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalle_venta', function (Blueprint $table) {
            $table->dropForeign('fk_detalle_venta');
            $table->dropForeign('fk_detalle_venta_articulo');
        });
    }
};
