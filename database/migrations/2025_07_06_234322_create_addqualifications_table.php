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
        Schema::create('addqualifications', function (Blueprint $table) {
            $table->id();

             // File paths (stored as strings pointing to uploaded files)
            $table->string('upload_ccc')->nullable();
            $table->string('upload_marksheet')->nullable();
            $table->string('upload_oldtc')->nullable();
            $table->string('upload_photot')->nullable();
            $table->string('upload_ppc')->nullable();
            $table->string('upload_aadhar')->nullable();
            $table->string('upload_signature')->nullable();
            $table->string('upload_payreceipt')->nullable();

            // Other fields
            $table->string('qualification')->nullable();
            $table->date('dateofobtaing')->nullable();
            $table->string('receiptno')->nullable();
            $table->string('payment_type')->nullable();
            $table->decimal('payment_amount', 10, 2);
            $table->date('payment_date')->nullable();
            $table->text('remarks')->nullable();
            $table->integer('send_by');
            $table->enum('status', [0,1,2])->default(0);
            $table->string('data_sheet')->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addqualifications');
    }
};
