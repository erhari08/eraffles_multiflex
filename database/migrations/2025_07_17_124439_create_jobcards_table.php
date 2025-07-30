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
        
        Schema::create('jobcards', function (Blueprint $table) {
            $table->id();
            $table->string('jobcard_no')->unique();
            $table->string('job_name');
            $table->string('tot_kgs');
            $table->string('wastage');
            $table->string('total');
            $table->string('formOfOutput');
            $table->string('wtperpouch');
            $table->string('tot_roll_wt');
            $table->json('printing');
            $table->json('lamination');
            $table->json('folding');
            $table->json('pouching');
            $table->unsignedTinyInteger('status')->default(0); // 0 = Pending, 1 = In Progress, 2 = Completed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobcards');
    }
};
