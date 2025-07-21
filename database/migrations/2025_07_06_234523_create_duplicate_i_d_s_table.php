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
        Schema::create('duplicate_i_d_s', function (Blueprint $table) {
           $table->id();

            // File uploads
            $table->string('upload_payreceipt')->nullable();
            $table->string('upload_photo')->nullable();
            $table->string('upload_signature')->nullable();

            // Info fields
            $table->string('receiptno');
            $table->string('payment_type');
            $table->decimal('payment_amount', 10, 2);
            $table->date('payment_date');
            $table->string('mobile');
            $table->string('email');
            $table->string('blood_group');
            $table->date('dob');
            $table->text('paddress');
            $table->integer('send_by');
            $table->enum('status', [0,1,2])->default(0);
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
        Schema::dropIfExists('duplicate_i_d_s');
    }
};
