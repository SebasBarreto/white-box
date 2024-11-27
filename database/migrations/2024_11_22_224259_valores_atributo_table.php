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
    Schema::create('valores_atributo', function (Blueprint $table) {
        $table->id();
        $table->foreignId('id_atributo')->constrained('atributos'); // FK hacia atributos
        $table->string('valor'); // Ejemplo: "S", "M", "L", "Blanco"
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
