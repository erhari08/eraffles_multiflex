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
       Schema::create('grns', function (Blueprint $table) {
        $table->id();

        $table->string('grn_doc'); // path or filename of the uploaded GRN document
        $table->date('grn_date'); // better than string
        $table->string('grn_number');
        $table->string('supplier_invoice_no');
        $table->date('supplier_invoice_date'); // better than string
        $table->string('supplier_name');
        $table->text('supplier_address'); // in case address is long

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grns');
    }
};
