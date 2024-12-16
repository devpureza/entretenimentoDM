<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->string('title')->nullable()->after('id'); // Permite NULL inicialmente
            $table->date('start_date')->nullable()->after('size');
            $table->date('end_date')->nullable()->after('start_date');
            $table->enum('position', ['Superior 1', 'Superior 2'])->nullable()->after('end_date');
        });
    }

    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropColumn(['title', 'start_date', 'end_date', 'position']);
        });
    }
};
