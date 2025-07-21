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
        Schema::create('user_attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('Photo_file_path');
            $table->string('Signature_file_path');
            $table->string('AddressProof_file_path');
            $table->string('AadharProof_file_path');
            $table->string('InstituteIDCard_file_path');
            $table->string('VoterIDCard_file_path');
            $table->string('DrivingLicense_file_path')->nullable();
            $table->string('DegreeDiplomaCertificate_file_path');
            $table->string('Provisional_file_path');
            $table->string('CourseCompletion_file_path');
            $table->string('AllMarksheet_file_path');
            $table->string('TransferCertificate_file_path');
            $table->string('SSLCMarksheet_file_path');
            $table->string('HSCMarksheet_file_path');
            $table->string('Affidavit_file_path');
            $table->string('ppc_certificate')->nullable();
            $table->string('ppc_idcard_front')->nullable();
            $table->string('ppc_idcard_back')->nullable();
            $table->string('ppc_fresh_paymentreceipt')->nullable();

            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_attachments');
    }
};
