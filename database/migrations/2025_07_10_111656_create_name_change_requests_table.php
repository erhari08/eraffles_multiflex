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
        Schema::create('name_change_requests', function (Blueprint $table) {
             $table->id();
             $table->string('new_name');
             $table->text('change_reason');
             $table->string('upload_registration');
             $table->string('upload_last_renewal');
             $table->string('upload_degree_certificate');
             $table->string('upload_gazette');
             $table->string('upload_aadhar');
             $table->string('upload_photo');
             $table->string('upload_signature');
             $table->string('receipt_no');
             $table->string('payment_type');
             $table->decimal('amount', 8, 2);
             $table->date('payment_date');
             $table->string('upload_payment_receipt');
             $table->text('remark');
             $table->enum('status', [0,1,2])->default(0);
             $table->integer('send_by');
             $table->string('datasheet')->nullable();
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('name_change_requests');
    }
};
