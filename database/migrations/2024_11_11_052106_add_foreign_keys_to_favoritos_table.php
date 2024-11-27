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
        Schema::table('favoritos', function (Blueprint $table) {
            $table->foreign(['idusuario'], 'favoritos_ibfk_1')->references(['idusers'])->on('users')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['idproducto'], 'favoritos_ibfk_2')->references(['id'])->on('producto')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('favoritos', function (Blueprint $table) {
            $table->dropForeign('favoritos_ibfk_1');
            $table->dropForeign('favoritos_ibfk_2');
        });
    }
};
