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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->timestamp('creado_en')->useCurrent();
            $table->string('nombre', 50);
            $table->string('artista', 50);
            $table->string('informacion', 2000);
            $table->integer('precio');
            $table->timestamp('inicio_evento');
            $table->integer('duracion');
            $table->integer('capacidad');
            $table->boolean('disponibilidad')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
