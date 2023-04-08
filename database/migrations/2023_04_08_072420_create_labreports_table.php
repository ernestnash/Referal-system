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
        Schema::create('labreports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->foreignId('physician_id')->constrained()->cascadeOnDelete();
            $table->foreignId('labtech_id')->constrained()->cascadeOnDelete();
            $table->foreignId('specimen_id')->constrained()->cascadeOnDelete();
            $table->string('report');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab-reports');
    }
};
