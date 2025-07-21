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
       Schema::create('cpe_approvals', function (Blueprint $table) {
            $table->id();

            // Foreign key to cpe_programs.id
            $table->integer('cpe_programs_id');
            $table->integer('send_by');
            $table->string('attendance')->nullable();       // File path or details
            $table->string('cc_certificate')->nullable();
            $table->string('certificate_no')->nullable();  // Path to certificate file
            $table->integer('status')->default(0);          // Approval status

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpe_approval');
    }
};
