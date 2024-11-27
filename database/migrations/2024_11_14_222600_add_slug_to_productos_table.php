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
    Schema::table('producto', function (Blueprint $table) {
        $table->string('slug')->nullable()->after('nombre');
    });
}

public function down()
{
    Schema::table('producto', function (Blueprint $table) {
        $table->dropColumn('slug');
    });
}

};