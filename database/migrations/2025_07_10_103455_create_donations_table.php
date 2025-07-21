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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
        $table->string('receipt_no');
        $table->string('payment_type');
        $table->decimal('amount', 10, 2);
        $table->date('payment_date');
        $table->string('upload_payment_receipt'); // file path
        $table->text('remark');
        $table->enum('status', [0,1,2])->default(0);
        $table->integer('send_by');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
