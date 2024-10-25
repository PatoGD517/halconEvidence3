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
            $table->string('customer_name');
            $table->integer('customer_number');
            $table->string('fiscal_data');
            $table->timestamp('order_date');
            $table->string('delivery_address');
            $table->string('notes')->nullable();
            $table->foreignId('user_id')->constrained(); // Reference to user (salesperson)
            $table->timestamps();
            $table->softDeletes(); // For logical deletion
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
