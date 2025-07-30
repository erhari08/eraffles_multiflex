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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            
            $table->string('po_doc'); // Path or filename of the uploaded PO document
            $table->string('customer_name'); // Customer's name
            $table->string('po_no'); // Purchase Order number
            $table->date('po_date'); // Date of the purchase order

            $table->string('work_order_ref'); // Work order reference
            $table->string('quotation_ref'); // Quotation reference

            $table->string('state_name'); // State name
            $table->string('state_code'); // State code
            $table->string('place_of_supply'); // Place of supply
            $table->string('supplier_GSTIN'); // Supplier GSTIN

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_orders');
    }
};
