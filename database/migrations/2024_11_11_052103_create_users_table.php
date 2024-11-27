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
        Schema::create('users', function (Blueprint $table) {
            $table->integer('idusers', true);
            $table->string('name', 100);
            $table->string('email', 100)->unique('email_unique');
            $table->string('password', 225);
            $table->enum('role', ['admin', 'cliente']);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('update_at')->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
