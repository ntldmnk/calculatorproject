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
        Schema::create('koretek', function (Blueprint $table) {
            $table->id('koretID');
            $table->string('koretNev') -> unique();
            $table->double('koretEnergia');
            $table->double('koretFeherje');
            $table->double('koretZsir');
            $table->double('koretSzenhidrat');
            $table->boolean('koretVegan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koretek');
    }
};
