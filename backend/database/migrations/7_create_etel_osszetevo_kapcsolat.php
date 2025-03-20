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
        Schema::create('etel_osszetevo_kapcsolatok', function (Blueprint $table) {
            $table->foreignId('EO_etelKulsoID') -> references('etelID') -> on('etelek');
            $table->foreignId('EO_osszetevoKulsoID') -> references('osszetevoID') -> on('osszetevok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etel_osszetevo_kapcsolatok');
    }
};
