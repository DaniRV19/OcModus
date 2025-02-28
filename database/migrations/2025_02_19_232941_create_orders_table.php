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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(App\Models\User::class, 'user_id');
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'shipped', 'delivered', 'canceled']);
            $table->enum('payment_method', ['transferencia', 'tarjeta', 'paypal']);
            $table->enum('payment_status', ['pending', 'completed', 'failed']);
            $table->enum('shipping_method', ['standard', 'express']);
            $table->decimal('shipping_cost', 10, 2);
            // Agregamos las columnas de dirección (permitiéndolas null por si no existen aún)
            $table->foreignId('shipping_address_id')->nullable()->constrained('addresses');
            $table->foreignId('billing_address_id')->nullable()->constrained('addresses');
            $table->string('tracking_number');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
