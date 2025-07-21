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
        Schema::create('duplicate_p_p_c_s', function (Blueprint $table) {
              $table->id();

            // File uploads
            $table->string('upload_ppc')->nullable();
            $table->string('upload_lastrenewalreceipt')->nullable();
            $table->string('upload_provisional')->nullable();
            $table->string('upload_fircopy')->nullable();
            $table->string('upload_proofdamage')->nullable();
            $table->string('upload_aadhar')->nullable();
            $table->string('upload_photo')->nullable();
            $table->string('upload_signature')->nullable();
            $table->string('upload_payreceipt')->nullable();

            // Personal Info
            $table->string('bloodgroup');
            $table->string('receiptno');
            $table->string('mobile');
            $table->string('address1');
            $table->string('address2');
            $table->string('address3');
            $table->string('pincode');

            $table->integer('send_by');
            $table->enum('status', [0,1,2])->default(0);
            // Payment Info
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
        Schema::dropIfExists('duplicate_p_p_c_s');
    }
};
