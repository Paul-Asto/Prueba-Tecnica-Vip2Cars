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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("placa", 10);
            $table->integer("año_fabricacion");
            $table->foreign("id_modelo")->references("id")->on("modelos");
            $table->foreign("id_propietario")->references("id")->on("propietarios");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
