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
        Schema::create('referalrequests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->cascadeOnDelete();
            $table->foreignId('physician_id')->constrained()->cascadeOnDelete();
            $table->foreignId('patientrecord_id')->constrained()->cascadeOnDelete();
            $table->foreignId('specimen_id')->constrained()->cascadeOnDelete();
            $table->string('Referal-type');
            $table->string('Destination');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referal-requests');
    }
};
