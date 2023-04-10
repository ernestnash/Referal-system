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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('date_of_birth');
            $table->string('age');
            $table->string('county');
            $table->string('city');
            $table->string('identification_method');
            $table->string('identification_no');
            $table->string('contact');
            $table->string('next_of_kin_name');
            $table->string('relationship');
            $table->string('kin_contact');
            $table->string('alternative_contact');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
