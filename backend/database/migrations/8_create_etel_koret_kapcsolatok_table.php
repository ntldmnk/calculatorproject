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
        Schema::create('etel_koret_kapcsolatok', function (Blueprint $table) {
            $table->foreignId('EK_etelKulsoID') -> references('etelID') -> on('etelek');
            $table->foreignId('EK_koretKulsoID') -> references('koretID') -> on('koretek');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etel_koret_kapcsolatok');
    }
};
