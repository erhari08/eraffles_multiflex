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
        Schema::create('address_changes', function (Blueprint $table) {
        $table->id();
        $table->string('new_address_1');
        $table->string('new_address_2');
        $table->string('new_address_3');
        $table->string('new_pin_code');
        $table->string('prev_org_name');
        $table->text('prev_org_address');
        $table->string('present_org_name');
        $table->text('present_org_address');
        $table->string('upload_residence');
        $table->string('upload_photo');
        $table->string('upload_signature');
        $table->string('upload_bloodgroup');
        $table->string('data_sheet')->nullable();
        $table->enum('status', [0,1,2])->default(0);
        $table->integer('send_by');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('address_changes');
    }
};
