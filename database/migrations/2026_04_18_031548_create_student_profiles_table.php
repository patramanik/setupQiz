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
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->id();
              // Relation with students table
        $table->foreignId('student_id')->constrained()->onDelete('cascade');

        // Profile fields
        $table->string('first_name');
        $table->string('last_name')->nullable();
        $table->string('phone')->nullable();
        $table->string('address')->nullable();
        $table->date('dob')->nullable();
        $table->string('gender')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profiles');
    }
};
