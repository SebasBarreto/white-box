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
        Schema::table('detalle_ingreso', function (Blueprint $table) {
            $table->foreign(['idingreso'], 'FK_DETALLE_INGRESO')->references(['idingreso'])->on('ingreso')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['idarticulo'], 'FK_DETALLE_INGRESO_ARTICULO')->references(['idarticulo'])->on('articulo')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detalle_ingreso', function (Blueprint $table) {
            $table->dropForeign('FK_DETALLE_INGRESO');
            $table->dropForeign('FK_DETALLE_INGRESO_ARTICULO');
        });
    }
};
