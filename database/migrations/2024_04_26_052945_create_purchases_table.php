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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id');
            $table->foreignId('client_id');
            $table->timestamp('comprado_en')->useCurrent();
            $table->string('metodo_pago', 20);
            // No es necesario el campo total, ya que se puede calcular con la relación entre eventos y compras
            //$table->integer('total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
