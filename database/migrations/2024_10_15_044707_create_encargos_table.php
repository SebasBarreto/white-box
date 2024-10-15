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
        Schema::create('encargo', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_producto');
            $table->integer('cantidad');
            $table->string('descripcion_del_producto');
            $table->string('transporte');
            $table->string('lugar_de_destino');
            $table->string('correo_electronico');
            $table->timestamps();
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
