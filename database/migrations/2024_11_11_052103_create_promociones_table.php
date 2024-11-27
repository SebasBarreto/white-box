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
        Schema::create('promociones', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idproducto')->nullable()->index('idproducto');
            $table->text('descripcion')->nullable();
            $table->decimal('descuento', 5)->nullable();
            $table->enum('tipo_promocion', ['descuento', 'combo', 'temporada', '2x1']);
            $table->timestamp('fecha_inicio')->nullable()->useCurrent();
            $table->timestamp('fecha_fin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promociones');
    }
};
