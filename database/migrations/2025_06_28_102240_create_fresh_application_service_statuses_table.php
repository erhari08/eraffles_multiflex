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
        Schema::create('fresh_application_service_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('utr_name')->nullable();
            $table->date('payment_date')->nullable();
            $table->decimal('payment_amount', 8, 2)->nullable(); // Price with 2 decimal places
            $table->text('fees_calculation_detail')->nullable(); // Price with 2 decimal places
            $table->text('payment_remarks')->nullable();
            $table->string('payment_attachment')->nullable();
            $table->timestamp('newapplication_initaliated')->nullable();
            $table->timestamp('newapplication_completed')->nullable();
            $table->timestamp('paymentrequest_initaliated')->nullable();
            $table->timestamp('paymentrequest_completed')->nullable();
            $table->timestamp('appointmentschedule_initaliated')->nullable();
            $table->timestamp('appointmentschedule_completed')->nullable();
            $table->timestamp('PPC_idgenaration_completed')->nullable();
            $table->json('appointment_schedule_dates')->nullable();
            $table->timestamp('appointment_fixed_date')->nullable();
            $table->enum('status', [0,1,2,3,4,5,6,7])->default(0); // or use string values like 'pending', 'active'
            $table->text('validity_period')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fresh_application_service_statuses');
    }
};
