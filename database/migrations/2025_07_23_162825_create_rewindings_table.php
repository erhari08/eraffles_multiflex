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
      Schema::create('rewindings', function (Blueprint $table) {
    $table->id();
    $table->date('rewind_date');
    $table->integer('shift_id');
    $table->unsignedBigInteger('operator_id');
    $table->Integer('jobcard_id');
    $table->unsignedBigInteger('machine_id'); // ✅ Add this line

    // Foreign keys
    $table->foreign('machine_id')->references('id')->on('machine')->onDelete('cascade');
    $table->foreign('operator_id')->references('id')->on('users')->onDelete('cascade');
    // $table->foreign('jobcard_id')->references('id')->on('jobcards')->onDelete('cascade');
    $table->tinyInteger('status')->default(0);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rewindings');
    }
};
