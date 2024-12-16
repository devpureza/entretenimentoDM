<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->string('subtitle')->nullable()->after('title'); // Subtítulo
            $table->string('anchor')->nullable()->after('subtitle'); // Âncora
            $table->json('tags')->nullable()->after('content'); // Tags como JSON
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropColumn(['subtitle', 'anchor', 'tags']);
        });
    }
};

