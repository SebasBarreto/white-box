<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticuloTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articulo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idcategoria'); // Relación con categoría
            $table->string('codigo');
            $table->string('nombre');
            $table->text('descripcion');
            $table->integer('stock');
            $table->string('imagen');
            $table->string('estado');
            $table->timestamps();

            // Clave foránea para idcategoria
            $table->foreign('idcategoria')->references('id')->on('categoria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulo');
    }
}
