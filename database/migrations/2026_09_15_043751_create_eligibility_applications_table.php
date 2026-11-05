<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('eligibility_applications', function (Blueprint $table) {
            $table->id();
            // Step 1: Personal Info
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            
            // Step 2: Experience & Qualification
            $table->string('industry')->nullable();
            $table->string('qualification')->nullable();
            $table->integer('experience_years')->default(0);
            $table->boolean('has_formal_qualification')->default(false); // "Do you have formal qualifications?"

            // Step 3: Location & Terms
            $table->string('state')->nullable();
            $table->boolean('terms_accepted')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eligibility_applications');
    }
};