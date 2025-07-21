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
        Schema::create('cpe_programs', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->date('date');
            $table->text('venue');
            $table->string('certificate_template')->nullable();
            $table->string('course_content')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cpe_programs');
    }
};
