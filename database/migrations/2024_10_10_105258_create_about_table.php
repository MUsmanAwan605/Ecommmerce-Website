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
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Main title like "Know More About Us"
            $table->text('main_content'); // Main content text
            $table->string('pt_one')->nullable(); // Subsection title for sanitization
            $table->text('pt_sec')->nullable(); // Sanitization description
            $table->string('pt_trd')->nullable(); // Contact title
            $table->string('frt_icon')->nullable(); // Title for delivery section
            $table->string('frt_title')->nullable(); // Title for delivery section
            $table->text('frt_content')->nullable(); // Content for delivery section
            $table->string('sec_icon')->nullable(); // Title for delivery section
            $table->string('sec_title')->nullable(); // Title for delivery section
            $table->text('sec_content')->nullable(); // Content for delivery section
            $table->string('trd_icon')->nullable(); // Title for delivery section
            $table->string('trd_title')->nullable(); // Title for delivery section
            $table->text('trd_content')->nullable(); // Content for delivery section
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about');
    }
};
