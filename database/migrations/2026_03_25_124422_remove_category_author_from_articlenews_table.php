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
        Schema::table('articlenews', function (Blueprint $table) {
            if (Schema::hasColumn('articlenews', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
            if (Schema::hasColumn('articlenews', 'author_id')) {
                $table->dropForeign(['author_id']);
                $table->dropColumn('author_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articlenews', function (Blueprint $table) {
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('author_id')->nullable()->constrained()->cascadeOnDelete();
        });
    }
};
