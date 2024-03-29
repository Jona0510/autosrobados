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
        Schema::create('autosrobados', function (Blueprint $table) {
            $table->id();
            $table->string('Marca');
            $table->string('Modelo');
            $table->date('Fecha_robo');
            $table->string('Estatus');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autosrobados');
    }
};
