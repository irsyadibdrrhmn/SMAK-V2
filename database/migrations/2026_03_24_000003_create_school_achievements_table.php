<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('school_achievements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('level')->nullable();
            $table->date('achievement_date')->nullable();
            $table->string('photo')->nullable();
            $table->enum('is_featured', ['featured', 'not_featured'])->default('not_featured');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('school_achievements');
    }
};
