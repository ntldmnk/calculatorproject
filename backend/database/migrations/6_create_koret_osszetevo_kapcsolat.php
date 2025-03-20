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
        Schema::create('koret_osszetevo_kapcsolatok', function (Blueprint $table) {
            $table->foreignId('KO_koretKulsoID') -> references('koretID') -> on('koretek');
            $table->foreignId('KO_osszetevoKulsoID') -> references('osszetevoID') -> on('osszetevok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koret_osszetevo_kapcsolatok');
    }
};
