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
        Schema::table('ingreso', function (Blueprint $table) {
            $table->foreign(['idproveedor'], 'FK_INGRESO_PERSONA')->references(['idpersona'])->on('persona')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ingreso', function (Blueprint $table) {
            $table->dropForeign('FK_INGRESO_PERSONA');
        });
    }
};
