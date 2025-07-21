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
        Schema::create('goodstandings', function (Blueprint $table) {
            $table->id();

            // File paths
            $table->string('upload_ppc')->nullable();
            $table->string('upload_lastrenewalreceipt')->nullable();
            $table->string('upload_degree')->nullable();
            $table->string('upload_aadhar')->nullable();
            $table->string('upload_photo')->nullable();
            $table->string('upload_payreceipt')->nullable();
            $table->integer('send_by');
            $table->enum('status', [0,1,2])->default(0);
            // Other fields
            $table->string('receiptno');
            $table->string('payment_type');
            $table->decimal('payment_amount', 10, 2);
            $table->date('payment_date');
            $table->text('remarks')->nullable();
            $table->string('data_sheet')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goodstandings');
    }
};
