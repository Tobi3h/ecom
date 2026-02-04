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
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->nullable()->constrained()->nullOnDelete();

            $table->string('reference')->unique();
            $table->integer('total_amount');

            $table->enum('status', [
                'pending',
                'confirmed',
                'preparing',
                'delivered',
                'cancelled'
            ])->default('pending');

            $table->string('payment_method')->default('cash_on_delivery');
            $table->boolean('payment_confirmed')->default(false);

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
