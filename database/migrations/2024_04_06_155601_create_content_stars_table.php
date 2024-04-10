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
        Schema::create('content_stars', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('gender')->nullable(); // Nullable gender field
            $table->text('description')->nullable(); // Nullable description field
            $table->date('date_of_birth')->nullable(); // Nullable date of birth field
            $table->string('poster_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_stars');
    }
};
