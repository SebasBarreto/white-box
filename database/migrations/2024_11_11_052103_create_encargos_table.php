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
        Schema::create('encargos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idusuario')->nullable()->index('idusuario');
            $table->string('producto_solicitado');
            $table->text('descripcion')->nullable();
            $table->integer('cantidad');
            $table->enum('estado', ['pendiente', 'en proceso', 'cotizado', 'rechazado', 'completado'])->nullable()->default('pendiente');
            $table->timestamp('fecha_solicitud')->nullable()->useCurrent();
            $table->timestamp('fecha_respuesta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encargos');
    }
};
