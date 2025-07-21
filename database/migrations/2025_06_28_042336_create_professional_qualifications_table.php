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
        Schema::create('professional_qualifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();

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

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_qualifications');
    }
};
