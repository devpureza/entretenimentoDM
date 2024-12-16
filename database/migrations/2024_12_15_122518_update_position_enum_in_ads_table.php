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
            $table->string('position')->nullable()->change(); // Muda para string se antes era enum
        });
    }

    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->enum('position', ['Superior 1', 'Superior 2'])->nullable()->change(); // Reverte para o enum antigo
        });
    }
};
