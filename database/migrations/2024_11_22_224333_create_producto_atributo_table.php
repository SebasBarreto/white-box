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
    Schema::create('producto_atributo', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_producto')->constrained('producto'); // FK hacia producto
        $table->foreignId('id_valor_atributo')->constrained('valores_atributo'); // FK hacia valores_atributo
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_atributo');
    }
};
