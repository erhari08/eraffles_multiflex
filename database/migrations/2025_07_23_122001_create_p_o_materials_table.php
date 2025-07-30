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
        Schema::create('p_o_materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('po_id');
            $table->unsignedBigInteger('product_id');
            $table->string('specification');
            $table->decimal('qty', 10, 2);
            $table->string('unit');
            $table->decimal('rate_per_unit', 10, 2); 
            $table->decimal('gst', 5, 2);
            $table->decimal('amount', 10, 2);
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('po_id')->references('id')->on('purchase_orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('p_o_materials');
    }
};
