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
        Schema::create('renewals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('renewalplan')->nullable();
            $table->string('utr_name')->nullable();
            $table->date('payment_date')->nullable();
            $table->decimal('payment_amount', 8, 2)->nullable(); // Price with 2 decimal places
            $table->text('fees_calculation_detail')->nullable(); // Price with 2 decimal places
            $table->text('payment_remarks')->nullable();
            $table->string('payment_attachment')->nullable();
            $table->timestamp('renewal_initaliated')->nullable();
            $table->timestamp('paymentrequest_initaliated')->nullable();
            $table->timestamp('paymentrequest_completed')->nullable();
            $table->timestamp('appointmentschedule_initaliated')->nullable();
            $table->timestamp('appointmentschedule_completed')->nullable();
            $table->timestamp('renewal_completed')->nullable();
            $table->json('appointment_schedule_dates')->nullable();
            $table->timestamp('appointment_fixed_date')->nullable();
            $table->string('present_professional_address')->nullable();
            $table->date('pres_from_date')->nullable();
            $table->date('pres_to_date')->nullable();
            $table->string('past_professional_address')->nullable();
            $table->date('past_from_date')->nullable();
            $table->date('past_to_date')->nullable();
            $table->string('last_ppc_certificate')->nullable();
            $table->string('last_paymentreceipt')->nullable();
            $table->string('working_proof')->nullable();
            $table->string('cpe_certificate')->nullable();
            $table->string('professional_proof')->nullable();
            $table->date('grace_period_end')->nullable();

            $table->enum('status', [0,1,2,3,4,5,6,7])->default(0); // or use string values like 'pending', 'active'
            $table->text('validity_period')->nullable();

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('renewals');
    }
};
