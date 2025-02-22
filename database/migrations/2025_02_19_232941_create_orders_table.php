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
            $table->decimal('total_amount');
            $table->enum('status', ['pending', 'shipped', 'delivered', 'canceled']);
            $table->enum('payment_method', []);
            $table->enum('payment_status', []);
            $table->enum('shipping_method', []);
            $table->decimal('shipping_cost');
            // $table->foreignIdFor(App\Models\Address::class, 'shipping_address'); //TODO::
            // $table->foreignIdFor(App\Models\Address::class, 'billing_address'); //TODO::
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
