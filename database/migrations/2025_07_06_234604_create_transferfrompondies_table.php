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
        Schema::create('transferfrompondies', function (Blueprint $table) {
          $table->id();

            // Uploads
            $table->string('upload_registration');
            $table->string('upload_lastreceipt');
            $table->string('upload_aadharcard');
            $table->string('upload_photo');
            $table->string('upload_signature');
            $table->string('upload_payreceipt');

            // Payment Info
            $table->string('reciptno');
            $table->string('payment_type');
            $table->decimal('amount', 10, 2);
            $table->date('payment_date');

            $table->integer('send_by');
            $table->enum('status', [0,1,2])->default(0);
            // Remarks
            $table->text('remark')->nullable();
             $table->string('data_sheet')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transferfrompondies');
    }
};
