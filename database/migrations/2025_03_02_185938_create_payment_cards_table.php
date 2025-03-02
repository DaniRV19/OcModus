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
        Schema::create('payment_cards', function (Blueprint $table) {
            $table->id();
            // Relación con el usuario dueño de la tarjeta
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Datos de la tarjeta
            $table->string('card_holder');         // Nombre del titular
            $table->string('card_number');           // Número de la tarjeta (considera tokenizar o enmascarar en producción)
            $table->string('expiration_date');       // Fecha de vencimiento (por ejemplo, MM/YY)
            $table->string('cvv')->nullable();       // CVV (opcional y generalmente no se almacena)
            $table->boolean('is_default')->default(false); // Tarjeta predeterminada del usuario
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_cards');
    }
};
