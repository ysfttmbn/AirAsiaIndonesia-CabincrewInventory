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
        Schema::create('personal_details_sizes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('female_cabin_shoes')->nullable();
            $table->string('female_ground_shoes')->nullable();
            $table->string('female_red_skirt')->nullable();
            $table->string('female_red_blazer')->nullable();
            $table->string('compression_top')->nullable();
            $table->string('male_black_pants')->nullable();
            $table->string('male_shoes')->nullable();
            $table->string('male_black_blazer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_details_sizes');
    }
};
