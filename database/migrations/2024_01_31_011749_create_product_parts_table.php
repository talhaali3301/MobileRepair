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
        Schema::create('product_parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id');
            $table->foreignId('product_id');
            $table->string('name');
            $table->text("description")->nullable();
            $table->decimal("customer_price", 10, 2);
            $table->decimal("agent_price", 10, 2);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_parts');
    }
};
