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
        Schema::create('propietarios', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nombre", 25)->nullable(false);
            $table->string("apellidos", 25)->nullable(false);
            $table->string("dni", 8)->nullable(false);
            $table->string("correo", 50)->nullable();
            $table->string("telefono", 9)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propietarios');
    }
};
