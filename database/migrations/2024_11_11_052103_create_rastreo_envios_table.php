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
        Schema::create('rastreo_envios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('idenvio')->nullable()->index('idenvio');
            $table->enum('estatus', ['en tránsito', 'en aduana', 'entregado', 'retrasado']);
            $table->string('ubicacion_actual')->nullable();
            $table->timestamp('fecha_actualizacion')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rastreo_envios');
    }
};
